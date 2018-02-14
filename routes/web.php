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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chats', 'ChatsController@index')->name('chat');
Route::get('/chat/{id}', 'ChatsController@show')->name('chat.show');


Route::post('/salvar-mensagem', 'MensagensController@createMessage')->name('mensagem.create');
