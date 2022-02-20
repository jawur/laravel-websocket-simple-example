<?php

use App\Events\WebsocketEvent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => redirect('messages'));
Route::get('messages', fn() => view('welcome'));

Route::get('messages/{message}', function($message) {
    broadcast(new WebsocketEvent($message));

    return 'Message sent';
});
