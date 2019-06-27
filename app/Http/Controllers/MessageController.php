<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeyPair;
use ParagonIE\EasyRSA\PublicKey;
use ParagonIE\EasyRSA\PrivateKey;
use ParagonIE\EasyRSA\EasyRSA;

class MessageController extends Controller
{
    public function getkeys()
    {
        $keyPairs = KeyPair::all();
        return view('decrypt.selectKey', ['keyPairs' => $keyPairs]);
    }

    public function enterEncrypted($keyId)
    {
        $keyPair = KeyPair::find($keyId);
        return view('decrypt.enterEncrypted', ['keyPair' => $keyPair]);
    }

    public function encryptedSingleFile($keyId, Request $request)
    {
        $keyPair = KeyPair::find($keyId);
        // $publicKey = new PublicKey($keyPair->public_key);
        $privateKey = new PrivateKey($keyPair->private_key);
        $plainText = EasyRSA::decrypt($request->message, $privateKey);
        return view('decrypt.enterEncrypted', ['plainText' => $plainText, 'keyPair' => $keyPair]);
    }

    public function encryptedJsonFile($keyId, Request $request)
    { }
}
