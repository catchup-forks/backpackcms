<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=> 'web'],function(){
});
//relation Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('relation','\App\Http\Controllers\RelationController');
  Route::post('relation/{id}/update','\App\Http\Controllers\RelationController@update');
  Route::get('relation/{id}/delete','\App\Http\Controllers\RelationController@destroy');
  Route::get('relation/{id}/deleteMsg','\App\Http\Controllers\RelationController@DeleteMsg');
});

//lead Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('lead','\App\Http\Controllers\LeadController');
  Route::post('lead/{id}/update','\App\Http\Controllers\LeadController@update');
  Route::get('lead/{id}/delete','\App\Http\Controllers\LeadController@destroy');
  Route::get('lead/{id}/deleteMsg','\App\Http\Controllers\LeadController@DeleteMsg');
});

//prospect Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('prospect','\App\Http\Controllers\ProspectController');
  Route::post('prospect/{id}/update','\App\Http\Controllers\ProspectController@update');
  Route::get('prospect/{id}/delete','\App\Http\Controllers\ProspectController@destroy');
  Route::get('prospect/{id}/deleteMsg','\App\Http\Controllers\ProspectController@DeleteMsg');
});
