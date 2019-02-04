<?php

namespace JulianBustamante\Laravel\Plaid\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JulianBustamante\Laravel\Plaid
 */
class Plaid extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'plaid';
    }
}
