<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeyPair;
use App\Contact;

class MessageController extends Controller
{
    public function listKeyPairPage()
    {
        $keyPairs = KeyPair::all();
        return view('Message.listKeyPairPage', ['keyPairs' => $keyPairs]);
    }

    public function decryptPage($keyPairId)
    {
        $keyPair = KeyPair::find($keyPairId);
        return view('Message.decryptPage', ['keyPair' => $keyPair]);
    }

    public function decryptAction($keyPairId, Request $request)
    {
        $request->validate([
            'message' => ['required', new \App\Rules\EncryptedMessage($keyPairId)],
        ]);

        $keyPair = KeyPair::find($keyPairId);
        $request->session()->put('message', $keyPair->decrypt($request->message));
        return redirect()->route('contact/decrypt_page', ['keyPairId' => $keyPairId]);
    }

    public function addContactPage()
    {
        return view('Message.addContactPage');
    }

    public function addContactAction(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,strict,dns,spoof,filter',
            'phone' => 'required|min:5|max:15',
            'public_key' => ['required', new \App\Rules\PublicKey],
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->public_key = $request->public_key;
        $contact->save();

        $request->session()->put('message', 'Contact succesfully saved!');

        return redirect()->route('contact/add_contact_page');
    }

    public function listContactPage()
    {
        $contacts = Contact::all();
        return view('Message.listContactPage', ['contacts' => $contacts]);
    }

    public function encryptPage($contactId)
    {
        $contact = Contact::find($contactId);
        return view('Message.encryptPage', ['contact' => $contact]);
    }

    public function encryptAction($contactId, Request $request)
    {
        $request->validate([
            'message' => 'required|min:5',
        ]);

        $contact = Contact::find($contactId);
        $request->session()->put('message', $contact->encrypt($request->message));
        return redirect()->route('contact/encypt_page', ['contactId' => $contactId]);
    }

    public function deleteContact($contactId)
    {
        try {
            $contact = Contact::findOrFail($contactId);
            $contact->delete();
            return response()->json(['success' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => "Invalid, we couldn't find any contact with the ID {$contactId}"], 404);
        }
    }
}
