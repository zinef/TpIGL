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
    return view("welcome");
});

Auth::routes();
Route:: get ('/saisirnotes/{id}',function($id){
return view('SaisirNotes',['id' => $id]) ;
});

Route::post('/saisirnotes/{id}', 'ProfesseurController@ajouterNote')->name('saisirnotes');


Route::get('/home', 'HomeController@index')->name('home');
/*Route::post ('/register',function(){
    $user = new App\user ;
    $user -> telephone=request('telephone') ;  
    $user -> surname=request('surname') ;
  $user -> name=request('name') ;
  $user -> email=request('email') ;
    $user -> adresse=request('adresse') ;

    $user -> dateDeNaissance=request('date') ;
    $user -> nationalite=request('nationalite') ;
    $user -> password=request('password') ;
    $user -> save() ;
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
