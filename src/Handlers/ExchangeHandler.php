<?php

namespace JulianBustamante\Laravel\Plaid\Handlers;

use JulianBustamante\Laravel\Plaid\Models\Item;
use JulianBustamante\Plaid\Resources\ResourceAbstract;

/**
 * Class ExchangeHandler
 *
 * This handler stores the access token and item id.
 *
 * @package JulianBustamante\Laravel\Plaid\Handlers
 */
class ExchangeHandler implements HandlerInterface
{

    public function handle(ResourceAbstract $resource, array $data = [])
    {
        $response = $resource->getData();

        if (empty($data['user_id'])) {
            throw new \InvalidArgumentException('Exchange handler requires user_id');
        }

        $item = new Item();
        $item->user_id = $data['user_id'];
        $item->item_id = $response['item_id'];
        $item->access_token = $response['access_token'];
        $item->save();
    }
}
