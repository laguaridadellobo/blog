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
use GuzzleHttp\Client;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/home', 'ProtestController')->middleware('revalidate');
Route::resource('/protest', 'ProtestController')->middleware('revalidate');
Route::get('/turnado', 'ProtestController@turnado')->middleware('revalidate');
Route::get('/noturnado', 'ProtestController@noturnado')->middleware('revalidate');
Route::get('/vence', 'ProtestController@vence')->middleware('revalidate');
Route::resource('/user', 'UserController')->middleware('revalidate');
Route::resource('/dependece', 'DependenceController')->middleware('revalidate');

Route::get('dropdown', function(){
	$id = Input::get('option');
	$procesos = Empresa::find($id)->procesos;
	return $procesos->lists('proceso', 'id');
});






Route::get('/home2', function () {
    return view('home2');
});
//Route::get('/home', 'HomeController@index')->name('home');
