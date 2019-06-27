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

//Generate a new key and attach metadata to it.
Route::get('/add_key_meta_data', 'Rsacontroller@addKeyMetaData')->name('add_key_meta_data');
Route::post('/new_key', 'Rsacontroller@generateKeyPairAndStore')->name('new_key');

//Decrypt messages
Route::get('/select_key', 'MessageController@getkeys')->name('select_key');
Route::get('/selected_key/{keyId}', 'MessageController@enterEncrypted')->name('enter_encrypted');
Route::post('/decrypt_message/encryptedSingleFile/{keyId}', 'MessageController@encryptedSingleFile')->name('encrypted_single_file');
Route::post('/decrypt_message/encryptedJsonFile/{keyId}', 'MessageController@encryptedJsonFile')->name('encrypted_json_file');
