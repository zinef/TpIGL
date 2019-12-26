<?php


use Illuminate\Http\Request;
use App\User;
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
   // return view('welcome');
    return response()->json(App\User::all());
});
Route::get('/informations/{id}','ProfesseurController@affichageInfos')->name('informations');
Auth::routes();
Route:: get ('/saisirnotes/{id}',function($id){
return view('SaisirNotes',['id' => $id]) ;
});
Route::post('/saisirnotes/{id}', 'ProfesseurController@ajouterNote')->name('saisirnotes');
Route::get('/liste/{id}', 'ProfesseurController@index')->name('liste');
Route::get('/home', 'HomeController@index')->name('home');




