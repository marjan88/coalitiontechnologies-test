<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@index');
Route::get('/xml', 'PageController@showXml');
Route::get('/delete/{id}', 'PageController@delete');

Route::post('/', array('as' => 'store', 'uses' => 'PageController@index' ));

