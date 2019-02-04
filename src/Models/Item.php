<?php

namespace JulianBustamante\Laravel\Plaid\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'access_token',
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

    /**
     * Retrieve user owner.
     */
    public function user()
    {
        return $this->belongsTo(config('plaid.models.user', App\Models\User::class));
    }

    /**
     * Get the accounts for the item.
     */
    public function accounts()
    {
        return $this->hasMany(config('plaid.models.account', Account::class));
    }
}
