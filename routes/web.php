<?php

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

Route::get('/', function () {return view('welcome');});

Route::get('/home','App\Http\Controllers\CharacterController@index')->name('index');

//Route::get('/character', 'App\Http\Controllers\CharacterController@index')->name('character');

Route::post('/enterCharacter', 'App\Http\Controllers\CharacterController@enterCharacter')->name('enterCharacter');

Route::get('/showCharacter', 'App\Http\Controllers\CharacterController@showCharacter')->name('showCharacter');

Route::post('/updateCharacter', 'App\Http\Controllers\CharacterController@updateCharacter')->name('updateCharacter');

Route::post('/deleteCharacter', 'App\Http\Controllers\CharacterController@deleteCharacter')->name('deleteCharacter');

Route::get('/mostPowerfulCharacter', 'App\Http\Controllers\CharacterController@mostPowerfulCharacter')->name('mostPowerfulCharacter');

Route::get('/searchCharacter', 'App\Http\Controllers\CharacterController@searchCharacter')->name('searchCharacter');

Route::get('/lessPowerfulCharacter', 'App\Http\Controllers\CharacterController@lessPowerfulCharacter')->name('lessPowerfulCharacter');

Route::get('/nigga', function () {return view('blackTemplate');});

//Route::patch('/updateCharacter','App\Http\Controllers\UpdateCharacterController@updateCharacter')->name('updateCharacter');
