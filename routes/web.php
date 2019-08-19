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
use Illuminate\Support\Facades\Input;
use App\Municipality;
use App\Dependence;
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


Route::get('ajax-subcat',function(){
   $cp_id = Input::get('cp_id');

   $muni = Municipality::select('id')->where('cp', '=', $cp_id)->first();
   $pro = Dependence::where('municipality_id','=',$muni->id)->get();
   return Response::eloquent($pro->get(['id','nombre']));
   //return Response::json($pro);


});


Route::get('/home2', function () {
    return view('home2');
});
//Route::get('/home', 'HomeController@index')->name('home');
