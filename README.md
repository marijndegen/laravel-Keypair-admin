# Laravel keypair admin

### TODO
Ecnryptie link maken vanaf listcontacts page

bij DELETE ACTIONS van get een delete action maken

validatie in backend toevoegen.

move encryption and decryption logic to model.
```
        $keyPair = KeyPair::find($keyPairId);
        $privateKey = new PrivateKey($keyPair->private_key);
        $plainText = EasyRSA::decrypt($request->message, $privateKey);
        $request->session()->put('plainText', $plainText);
        return redirect()->route('contact/decrypt_page', ['keyPairId' => $keyPairId]);
```


## Terms
### You have:
- RSA
- KeyPair
    - id
    - public_key
    - private_key
    - description
- Contacts
    - id
    - name
    - email
    - phone
    - public_key

## Controllers
- RSAController.php (Everything that has to do with creating, deleting and downloading keys)
- MessageController.php (Everything that has to do with managing contacts (CRUD), encrypting/decrypting (Using keypair / public keys) and CRUD actions that are not covered in the RSAController