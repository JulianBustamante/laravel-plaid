<?php

namespace JulianBustamante\Laravel\Plaid\Traits;

use JulianBustamante\Laravel\Plaid\Models\Account;
use JulianBustamante\Laravel\Plaid\Models\Item;

trait HasPlaidItem
{
    /**
     * Retrieve all the user Plaid items.
     */
    public function items()
    {
        return $this->hasMany(config('plaid.models.item', Item::class));
    }

    /**
     * Retrieve all the user Plaid accounts.
     */
    public function accounts()
    {
        return $this->hasManyThrough(config('plaid.models.account', Account::class), config('plaid.models.item', Item::class));
    }
}
