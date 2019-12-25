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
use App\User;
use Illuminate\Http\Request ;
Route::get('/', function () {
    return view('welcome');
    //return response()->json(App\User::where('name','lefkjnz')->get());
});


Auth::routes();
Route:: get ('/saisirnotes/{id}',function($id){
return view('SaisirNotes',['id' => $id]) ;
});

Route::post('/saisirnotes/{id}', 'ProfesseurController@ajouterNote')->name('saisirnotes');

Route::get('/liste/{id}', 'ProfesseurController@index')->name('liste');
Route::get('/home', 'HomeController@index')->name('home');
/*
Route::post('/a', function(Request $request){
    $user = new User;
    $user->email=$request->input('email');
    $user->password=$request->input('password');

    $user->save();
});*/

//Route::post('/a', 'ProfesseurController@create')->name('a');
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
/*
Route::post('/requete',function(Request $request){
  $user = new App\User() ;
  $name = $request->input('email');
  return $name;
  
});*/

