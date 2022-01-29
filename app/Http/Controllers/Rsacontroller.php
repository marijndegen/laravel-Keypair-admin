<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ParagonIE\EasyRSA\EasyRSA;
use App\KeyPair;
use App\Contact;

class Rsacontroller extends Controller
{
    public function createKeyPairPage()
    {
        return view('RSA.createKeyPairPage');
    }

    public function createKeyPairAction(Request $request)
    {
        ini_set('max_execution_time', 300); // Generating a key can take a while
        $keyPair = \ParagonIE\EasyRSA\KeyPair::generateKeyPair(6144);

        $privateKey = $keyPair->getPrivateKey();
        $publicKey = $keyPair->getPublicKey();

        $KeyPairModel = new KeyPair();
        $KeyPairModel->description = $request->description;
        $KeyPairModel->private_key = $privateKey->getKey();
        $KeyPairModel->public_key = $publicKey->getKey();
        $KeyPairModel->save();

        $request->session()->put('message', EasyRSA::encrypt("You have successfully decrypted the message!", $publicKey));
        return redirect()->route('rsa/create_key_pair_page');
    }

    public function deleteKey($keyPairId)
    {
        $KeyPair = KeyPair::findOrFail($keyPairId);
        $KeyPair->delete();
        return redirect()->route('contact/list_key_pair_page');
    }

    public function downloadPrivateKeyFromKeyPair($keyPairId)
    {
        $keyPair = KeyPair::findOrFail($keyPairId);
        return $this->downloadKey($keyPair->private_key, "id_rsa");
    }

    public function downloadPublicKeyFromKeyPair($keyPairId)
    {
        $keyPair = KeyPair::findOrFail($keyPairId);
        return $this->downloadKey($keyPair->public_key, "id_rsa.pub");
    }

    public function downloadPublicKeyFromContact($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        return $this->downloadKey($contact->public_key, "id_rsa.pub");
    }

    private function downloadKey($publicKey, $fileName)
    {
        return response()->attachment($publicKey, $fileName);
    }
}
