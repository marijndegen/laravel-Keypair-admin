<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ParagonIE\EasyRSA\EasyRSA;
use App\KeyPair;
use Illuminate\Support\Facades\Redirect;

class Rsacontroller extends Controller
{
    public function addKeyMetaData(){
        return view('generate.addMetaData');
    }

    public function generateKeyPairAndStore(Request $request)
    {
        ini_set('max_execution_time', 300);
        $keyPair = \ParagonIE\EasyRSA\KeyPair::generateKeyPair(6144);

        $privateKey = $keyPair->getPrivateKey();
        $publicKey = $keyPair->getPublicKey();

        $KeyPairModel = new KeyPair(); 
        $KeyPairModel->description = $request->description;
        $KeyPairModel->private_key = $privateKey->getKey();
        $KeyPairModel->public_key = $publicKey->getKey();
        $KeyPairModel->save();
        $randomNumber = rand(1, 1000);
        return view('welcome', ['message' => "Test the newly created key {$request->description}({$randomNumber}): " . EasyRSA::encrypt("$randomNumber", $publicKey)]);

        // var_dump($privateKey->getKey());
        // echo "<br><br><br><br>";
        // var_dump($publicKey->getKey());

        // $message = "test";

        // $ciphertext = EasyRSA::encrypt($message, $publicKey);

        // $plaintext = EasyRSA::decrypt($ciphertext, $privateKey);

        // echo "<br><br><br><br><br>";

        // echo $ciphertext;

        // echo "<br><br><br><br>";

        // echo $plaintext;
    }
}
