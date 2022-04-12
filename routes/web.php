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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','claim@dashboard');

Route::group(['prefix' => 'report'], function () {
	Route::get('/','report@index');
	Route::post('/getIcd10','report@getIcd10')->name('report.getIcd10');
	Route::get('/process','report@process')->name('report.process');
});

Route::group(['prefix' => 'todo'], function () {
	Route::get('/','todo@index');
	Route::get('/sendline','todo@sendline');
	Route::post('/sendData','todo@sendData')->name('sendData');
});

Route::group(['prefix' => 'claim'], function () {
	Route::get('/','claimlist@index');
	Route::get('/list','claimlist@list');
	Route::get('/confirm/{id}','claimlist@confirm')->name('claim.confirm');
	Route::get('/decline/{id}','claimlist@decline')->name('claim.decline');
});