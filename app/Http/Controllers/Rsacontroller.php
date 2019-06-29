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

        $request->session()->put('message', EasyRSA::encrypt("You have successfully decrypted the message!", $publicKey));
        return redirect()->route('add_key_meta_data');

        //return view('welcome', ['message' => "Test the newly created key {$request->description}({$randomNumber}): " . EasyRSA::encrypt("$randomNumber", $publicKey)]);
    }
}
