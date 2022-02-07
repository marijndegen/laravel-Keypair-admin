<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ParagonIE\EasyRSA\PrivateKey;
use ParagonIE\EasyRSA\EasyRSA;

class KeyPair extends Model
{
    protected $fillable = [
        'description', 'private_key', 'public_key',
    ];

    public function decrypt($message)
    {
        return EasyRSA::decrypt($message, new PrivateKey($this->private_key));
    }
}
