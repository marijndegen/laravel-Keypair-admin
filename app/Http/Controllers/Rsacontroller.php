<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ParagonIE\EasyRSA\KeyPair;
use ParagonIE\EasyRSA\EasyRSA;

class Rsacontroller extends Controller
{
    public function generateKeyPair()
    {
        $keyPair = KeyPair::generateKeyPair(4096);

        $secretKey = $keyPair->getPrivateKey();
        $publicKey = $keyPair->getPublicKey();

        var_dump($secretKey->getKey());
        echo "<br><br><br><br>";
        var_dump($publicKey->getKey());

        $message = "test";

        $ciphertext = EasyRSA::encrypt($message, $publicKey);

        $plaintext = EasyRSA::decrypt($ciphertext, $secretKey);

        echo "<br><br><br><br><br>";

        echo $ciphertext;

        echo "<br><br><br><br>";

        echo $plaintext;
    }
}
