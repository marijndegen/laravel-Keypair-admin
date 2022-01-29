<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Generate a new key pair
Route::get('/rsa/create_key_pair_page', 'Rsacontroller@createKeyPairPage')->name('create_key_pair_page');
Route::post('/rsa/create_key_pair_action', 'Rsacontroller@createKeyPairAction')->name('create_key_pair_action');

// Download keys
Route::get('/rsa/downloadPrivateKey/{keyPairId}', 'Rsacontroller@downloadPrivateKeyFromKeyPair')->name('downloadPrivateKey');
Route::get('/rsa/downloadPublicKey/{keyPairId}', 'Rsacontroller@downloadPublicKeyFromKeyPair')->name('downloadPublicKey');
Route::get('/contact/downloadPublicKey/{contactId}', 'Rsacontroller@downloadPublicKeyFromContact')->name('contact/downloadPublicKey');

// Decrypt messages
Route::get('/key_pair/list_key_pair_page', 'MessageController@listKeyPairPage')->name('key_pair/list_key_pair_page');
Route::get('/key_pair/decrypt_page/{keyPairId}', 'MessageController@decryptPage')->name('key_pair/decrypt_page');
Route::post('/key_pair/decrypt_action/{keyPairId}', 'MessageController@decryptAction')->name('key_pair/decrypt_action');
Route::get('/key_pair/delete/{keyPairId}', 'Rsacontroller@deleteKey')->name('key_pair/delete');

// Add a contact (public key)
Route::get('/public_key/add_public_key_page', 'RsaController@addPublicKeyPage')->name('public_key/add_public_key_page');
Route::post('/public_key/add_public_key_action', 'RsaController@addPublicKeyAction')->name('public_key/add_public_key_action');

//
Route::get('/public_key/list_public_key_page', 'MessageController@listPublicKeyPage')->name('public_key/list_public_key_page');
Route::get('/public_key/encrypt_action/{publicKeyId}', 'MessageController@')->name('public_key/enc');
Route::get('/public_key/delete/{keyPairId}', 'MessageController@')->name('public_key/list_contact_page');


Route::get('/public_key/encrypt', 'MessageController@TEST')->name('TEST');

// Route::get('/public_key/list_public_key_page', 'MessageController@listPublicKeyPairPage')->name('public_key/list_public_key_page');
// Route::get('/public_key/encrypt_page/')


// Route::post('/decrypt_message/encryptedJsonFile/{keyPairId}', 'MessageController@encryptedJsonFile')->name('encrypted_json_file');
