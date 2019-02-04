<?php

namespace JulianBustamante\Laravel\Plaid;

use JulianBustamante\Plaid\ServiceAbstract;

class Plaid
{
    /**
     * Plaid Service Client.
     *
     * @var \JulianBustamante\Plaid\ServiceAbstract
     */
    protected $plaid;

    /**
     * Additional data required by the handler.
     *
     * @var array
     */
    protected $handler_data;

    /**
     * Create a new Plaid Instance.
     *
     * @param \JulianBustamante\Plaid\ServiceAbstract $plaid
     */
    public function __construct(ServiceAbstract $plaid)
    {
        $this->plaid = $plaid;
    }

    public function __call($method, $arguments)
    {
        $this->handle(function ($plaid) use ($method, $arguments) {
            try {
                return $plaid->$method(...$arguments);
            } catch (\Exception $e) {
                report($e);
            }
        }, $method);
    }

    public function handle($callback, $method)
    {
        $resource = $callback($this->plaid);

        // Run custom and default handlers.
        $config_handlers = config('plaid.handlers');
        $method_handlers = $config_handlers[$method] ?? [];
        $default_handlers = $config_handlers['default'];

        $handlers = array_merge($method_handlers, $default_handlers);

        // If there are no custom handlers, then add the default one for the method.
        if (empty($method_handlers)) {
            $handlers[] = __NAMESPACE__ . '\Handlers' . ucfirst($method) . 'Handler';
        }

        foreach ($handlers as $handler) {
            if (class_exists($handler)) {
                /** @var \JulianBustamante\Laravel\Plaid\Handlers\HandlerInterface $instance */
                $instance = new $handler();
                $instance->handle($resource, $this->handler_data);
            }
        }
    }

    /**
     * Set data to be sent to the handler.
     *
     * @param $handler_data
     */
    public function setHandlerData($handler_data): void
    {
        $this->handler_data = $handler_data;
    }
}
