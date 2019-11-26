<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note ;
class ProfesseurController extends Controller
{
   public function ajouterNote($id){
         $note = new Note() ; 
        //$note -> etudiant_id = id ;
        $note -> ci= request('ci') ;
        $note -> cf= request('cf') ;
        $note -> cc= request('cc') ;
        $note->etudiant_id = $id;

        $note -> save() ;
        return redirect('/') ;
    }







    
   // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
/*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ci' => ['required', 'string', 'max:255'],
            'cf' => ['required', 'string', 'max:255'],
            'cc' => ['required', 'string', 'max:255'],
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Note
     */
    /*
    protected function create(array $data)
    {
        return Note::create([
            'ci' => $data['ci'],
            'cf' => $data['cf'],
            'cc' => $data['cc'],
       
        ]);
    }*/
}
