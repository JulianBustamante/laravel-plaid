<?php

namespace JulianBustamante\Laravel\Plaid\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'request_id',
        'uri',
        'response',
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

}
