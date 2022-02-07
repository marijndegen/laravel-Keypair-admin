<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ParagonIE\EasyRSA\PublicKey;
use ParagonIE\EasyRSA\EasyRSA;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'public_key',
    ];

    public function encrypt($message)
    {
        return EasyRSA::encrypt($message, new PublicKey($this->public_key));
    }
}
