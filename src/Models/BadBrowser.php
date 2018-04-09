<?php

namespace Helldar\BadBrowser\Models;

use Illuminate\Database\Eloquent\Model;

class BadBrowser extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'user_agent', 'client_ip', 'is_verified'];

    /**
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'is_verified' => 'bool',
    ];
}
