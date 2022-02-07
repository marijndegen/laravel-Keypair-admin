# Laravel keypair admin

## Installation
1. Clone repo
2. composer install
3. mv / copy .env.example .env
4. configure .env to your needs
5. php artisan key:generate
6. php artisan migrate
7. php artisan serve

## Terms
### You have:
- RSA the general encryption package
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