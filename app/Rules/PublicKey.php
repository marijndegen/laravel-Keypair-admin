<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ParagonIE\EasyRSA\PublicKey as EasyRSA_PublicKey;
use ParagonIE\EasyRSA\Exception\InvalidKeyException;
use ParagonIE\EasyRSA\EasyRSA;

class PublicKey implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $publicKey = new EasyRSA_PublicKey($value);
            EasyRSA::encrypt("test", $publicKey);
            return true;
        } catch (InvalidKeyException $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'validation.publickey';
    }
}
