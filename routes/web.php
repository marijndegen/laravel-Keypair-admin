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
Route::get('/rsa/create_key_pair_page', 'RSAController@createKeyPairPage')->name('rsa/create_key_pair_page');
Route::post('/rsa/create_key_pair_action', 'RSAController@createKeyPairAction')->name('rsa/create_key_pair_action');

// Deleting a key pair
Route::get('/rsa/key_pair/delete/{keyPairId}', 'RSAController@deleteKey')->name('rsa/key_pair/delete');

// Download own keys
Route::get('/rsa/downloadPrivateKey/{keyPairId}', 'RSAController@downloadPrivateKeyFromKeyPair')->name('downloadPrivateKey');
Route::get('/rsa/downloadPublicKey/{keyPairId}', 'RSAController@downloadPublicKeyFromKeyPair')->name('downloadPublicKey');

// Download contact public keys
Route::get('/contact/downloadPublicKey/{contactId}', 'RSAController@downloadPublicKeyFromContact')->name('contact/downloadPublicKey');

// Decrypt messages
Route::get('/contact/list_key_pair_page', 'MessageController@listKeyPairPage')->name('contact/list_key_pair_page');
Route::get('/contact/decrypt_page/{keyPairId}', 'MessageController@decryptPage')->name('contact/decrypt_page');
Route::post('/contact/decrypt_action/{keyPairId}', 'MessageController@decryptAction')->name('contact/decrypt_action');

// Add a contact (public key)
Route::get('/contact/add_contact_page', 'MessageController@addContactPage')->name('contact/add_contact_page');
Route::post('/contact/add_contact_action', 'MessageController@addContactAction')->name('contact/add_contact_action');

// Encrpyt messages
Route::get('/contact/list_contact_page', 'MessageController@listContactPage')->name('contact/list_contact_page');
Route::get('/contact/encrypt_page/{contactId}', 'MessageController@encryptPage')->name('contact/encypt_page');
Route::post('/contact/encrypt_action/{contactId}', 'MessageController@encryptAction')->name('contact/encrypt_action');
