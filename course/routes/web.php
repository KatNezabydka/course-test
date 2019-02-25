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


Route::get('/', 'StartController@index')->name('start');
Route::post('/', 'StartController@store')->name('start.store');


Route::get('/step-1', 'Step1Controller@index')->name('step-1');
Route::post('/step-1', 'Step1Controller@store')->name('step-1.store');

Route::get('/step-2', 'Step2Controller@index')->name('step-2');
Route::post('/step-2', 'Step2Controller@store')->name('step-2.store');

Route::get('/step-3', 'Step3Controller@index')->name('step-3');
Route::post('/step-3', 'Step3Controller@store')->name('step-3.store');

Route::get('/step-4', 'Step4Controller@index')->name('step-4');
Route::post('/step-4', 'Step4Controller@store')->name('step-4.store');

Route::get('/finish', 'FinishController@index')->name('finish');

