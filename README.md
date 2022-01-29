# Laravel keypair admin

### TODO
3. validatie in backend toevoegen.
- Bij decryption, custom validator maken
- Copy text button bij encyption maken
- required|min:5 toevoegen bij encypt action.

4. move encryption and decryption logic to model.
```
        $keyPair = KeyPair::find($keyPairId);
        $privateKey = new PrivateKey($keyPair->private_key);
        $plainText = EasyRSA::decrypt($request->message, $privateKey);
        $request->session()->put('plainText', $plainText);
        return redirect()->route('contact/decrypt_page', ['keyPairId' => $keyPairId]);
```

foutafhandeling bij error met encrypten.

--1. grote van text veranderen.

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