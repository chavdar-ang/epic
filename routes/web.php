<?php

use ArangoDB\Collection\Collection;
use ArangoDB\Connection\Connection;

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

    
    $connection = new Connection([
        'host' => 'http://localhost',
        'port' => 8529,
        'username' => 'root',
        'password' => '123456',
        'database' => '_system',
        'connection' => 'Keep-Alive',
        'timeout' => 30
    ]);
    
    $database = $connection->getDatabase();
    
    // // If collection exists on database, the object will be a representation of it.
    $collection = new Collection('users', $database);
    
    // // If collection not exists, you can create it with method 'save'
    $collection->save();
    
    // // Get all documents from collection
    foreach ($collection->all() as $document){
        dump($document);
    }

    // return view('welcome');
});
