<?php

return [
    /*
     * Plaid API keys and access
     */

    /*
     * Two private API keys; used in conjunction with an access_token to access
     * data for an Item.
     *
     * https://plaid.com/docs/#api-keys-and-access
     */
    'client_id' => env('PLAID_CLIENT_ID', null),
    'secret' => env('PLAID_SECRET', null),

    /**
     * Plaid environments (sandbox, development, production).
     *
     * https://plaid.com/docs/#api-host
     */
    'environment' => env('PLAID_ENVIRONMENT', 'sandbox'),

    /**
     *  Default models for Plaid entities.
     */
    'models' => [
        'account' => JulianBustamante\Laravel\Plaid\Models\Account::class,
        'item' => JulianBustamante\Laravel\Plaid\Models\Item::class,
        'request' => JulianBustamante\Laravel\Plaid\Models\Request::class,

        /*
         * Set this value if the users' namespace is different from
         * App\Models\User
         */
        'user' => null,
    ],

    'handlers' => [
        'default' => [
            JulianBustamante\Laravel\Plaid\Handlers\LoggerHandler::class
        ],
        'exchange' => [],
        'auth' => [],
        'balance' => [],
    ],
];
