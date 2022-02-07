<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ParagonIE\EasyRSA\Exception\InvalidCiphertextException;
use ParagonIE\EasyRSA\Exception\InvalidChecksumException;
use ParagonIE\EasyRSA\Exception\InvalidKeyException;

use App\KeyPair;

class EncryptedMessage implements Rule
{
    private $keyPairId;

    private $errorMessage;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($keyPairId)
    {
        $this->keyPairId = $keyPairId;
    }

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
            $keyPair = KeyPair::findOrFail($this->keyPairId);
            if (is_string($keyPair->decrypt($value)))
                return true;
        } catch (ModelNotFoundException $e) {
            $this->errorMessage = 'validation.keypairnotfound';
        } catch (InvalidKeyException $e) {
            $this->errorMessage = 'validation.privatekey';
        } catch (InvalidCiphertextException | InvalidChecksumException $e) {
            $this->errorMessage = 'validation.invalidencryptedmessage';
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
