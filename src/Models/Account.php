<?php

namespace JulianBustamante\Laravel\Plaid\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'account',
        'account_id',
        'name',
        'official_name',
        'mask',
        'type',
        'subtype',
        'routing',
        'wire_routing',
        'iso_currency_code',
        'available',
        'limit',
        'current',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
