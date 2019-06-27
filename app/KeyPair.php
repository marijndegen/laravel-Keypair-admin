<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyPair extends Model
{
    protected $fillable = [
        'description', 'private_key', 'public_key',
    ];
}
