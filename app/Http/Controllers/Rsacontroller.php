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
        $request->validate([
            'description' => 'required|unique:key_pairs|min:3|max:255',
        ]);

        ini_set('max_execution_time', 300); // Generating a key can take a while
        $keyPair = \ParagonIE\EasyRSA\KeyPair::generateKeyPair(6144);

        $privateKey = $keyPair->getPrivateKey();
        $publicKey = $keyPair->getPublicKey();

        $KeyPairModel = new KeyPair();
        $KeyPairModel->description = $request->description;
        $KeyPairModel->private_key = $privateKey->getKey();
        $KeyPairModel->public_key = $publicKey->getKey();
        $KeyPairModel->save();

        $request->session()->put('message', EasyRSA::encrypt("You have successfully decrypted the first test message of the private key {$request->description}!", $publicKey));
        return redirect()->route('rsa/create_key_pair_page');
    }

    public function deleteKeyPair($keyPairId)
    {
        try {
            $KeyPair = KeyPair::findOrFail($keyPairId);
            $KeyPair->delete();
            return response()->json(['success' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => "Invalid, we couldn't find any key pair with the ID {$keyPairId}"], 404);
        }
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
