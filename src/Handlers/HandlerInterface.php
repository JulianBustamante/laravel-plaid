<?php

namespace JulianBustamante\Laravel\Plaid\Handlers;

use JulianBustamante\Plaid\Resources\ResourceAbstract;

interface HandlerInterface
{
    public function handle(ResourceAbstract $resource, array $data = []);
}
