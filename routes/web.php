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
Route::prefix('api')->group(function(){

});

Route::get('/event', function($user){
    Event::fire(new \App\Events\SomeEvent(3));
    return "hello world";
});

Route::get('/test',function(){
    return response()->json(['data'=>0]);
});