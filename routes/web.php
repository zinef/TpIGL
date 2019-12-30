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

Auth::routes();
Route::get('/', function () {
    return view('welcomeHichem'); 
});
Route::get('/Enseignant/Note', 'ProfesseurController@index')->name('liste');
Route::post('/envoyerNote','ProfesseurController@affectationDesNotes');


//Anciennes routes
Route::get('/informations/{id}','ProfesseurController@affichageInfos')->name('informations');
Route:: get ('/saisirnotes/{id}',function($id){
return view('SaisirNotes',['id' => $id]) ;
});
//Route::get('/home', 'HomeController@index')->name('home');




