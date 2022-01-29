<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeyPair;
use App\Contact;
use ParagonIE\EasyRSA\PublicKey;
use ParagonIE\EasyRSA\PrivateKey;
use ParagonIE\EasyRSA\EasyRSA;

class MessageController extends Controller
{
    public function listKeyPairPage()
    {
        $keyPairs = KeyPair::all();
        return view('decrypt.listKeyPairPage', ['keyPairs' => $keyPairs]);
    }

    public function decryptPage($keyPairId)
    {
        $keyPair = KeyPair::find($keyPairId);
        return view('decrypt.decryptPage', ['keyPair' => $keyPair]);
    }

    public function decryptAction($keyPairId, Request $request)
    {
        $keyPair = KeyPair::find($keyPairId);
        // $publicKey = new PublicKey($keyPair->public_key);
        $privateKey = new PrivateKey($keyPair->private_key);
        $plainText = EasyRSA::decrypt($request->message, $privateKey);

        $request->session()->put('plainText', $plainText);
        return redirect()->route('key_pair/decrypt_page', ['keyPairId' => $keyPairId]);

        // return view('decrypt.decrypt_page', ['plainText' => $plainText, 'keyPair' => $keyPair]);
    }

    public function listPublicKeyPage()
    {
        $contacts = Contact::all();
        return view('encrypt.listPublicKeyPage', ['contacts' => $contacts]);
    }

    public function TEST()
    {
        $keyPair = KeyPair::find(3);
        $publicKey = new PublicKey($keyPair->public_key);

        echo EasyRSA::encrypt("Two plus two is four (secret)", $publicKey);
    }
}
