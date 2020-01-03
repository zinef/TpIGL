<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note ;
use App\User ;
use App\Etudiant ;
use App\Professeur;
use App\Module;
class ProfesseurController extends Controller
{

    /* les méthodes qui controllent l'affetation des notes*/
    public function affectationDesNotes(Request $request){
        $exam=request('exam');
        $niveau=request('niveau');
        $group=request('group');
        $moduleCode=request('module');
        $idEtudiant=request('id');
        $module=Module::where('code',$moduleCode)->get(); 
        $moduleId=$module[0]->id;
        $note =Note::where('etudiant_id',$idEtudiant)->where('module_id',$moduleId)->get();
        if (!empty($note[0])){//modification d'une note existante déja
                $noteId=$note[0]->id;
                $note=Note::find($noteId);
                if($exam == "cc"){
                    $note -> cc= request('note') ;
                }
                if ($exam =="cf"){
                    $note -> cf= request('note') ;
                }
                if($exam =="ci"){
                    $note -> ci= request('note') ;
                }
                $note->moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;
                $note->save();
        }else{

            $note = new Note();

            if($exam == "cc"){
                $note -> cc= request('note') ;
            }
            if ($exam =="cf"){
                $note -> cf= request('note') ;
            }
            if($exam =="ci"){
                $note -> ci= request('note') ;
            }
            $note->moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;
            $note->etudiant_id = $idEtudiant;
            $note->module_id= $moduleId;  
            $note->save();
        }
        
        return response()->json(['success' => 'success'], 200);
    }


    /*la méthode qui retourne les listes des etudiants soit pour leurs affecter des notes
     ou pour afficher ces derneiere*/
    public function index(Request $request){
     
        if (count($request->all())){
            $niveau=request('niveau');
            $groupe=request('group');
            $module=request('module');
            $etudiants=Etudiant::where('niveau',$niveau)
                                ->where('groupe_id',$groupe)
                                ->get();
            $Module=Module::where('code',$module)->get();
            $idModule=$Module[0]->id;
            $data=[

            ];
            $noteAAfficher=[

            ];
            foreach($etudiants as $etudiant){
                $idEtudiant=$etudiant->id;
                $note=Note::where('etudiant_id',$idEtudiant)
                      ->where('module_id',$idModule)
                      ->get();
                if(!empty($note[0])){
                    array_push($noteAAfficher,$note[0]);
                }else{
                    $note = new Note();
                    $note->etudiant_id = $idEtudiant;
                    $note->module_id= $idModule;  
                    $note->save();
                    array_push($noteAAfficher,$note);
                }
            }

            foreach($noteAAfficher as $n){  
                $etudiant=Etudiant::find($n->etudiant_id);
                $user=User::find($n->etudiant_id);
                $datatoadd=[
                    "id"=>$n->etudiant_id,
                    "matricule"=>$etudiant->matricule,
                    "nom"=>$user->surname,
                    "prenom"=>$user->name,
                    "cc"=>$n->cc,
                    "ci"=>$n->ci,
                    "cf"=>$n->cf,
                    "moyenne"=>$n->moyenne
                ];
                array_push($data,$datatoadd);
            }
            return response()->json($data);
        }
    }

    /*les méthodes qui controllent l'affichage des information */

    public function affichageInfos($id){
       /* $user= Auth::user();
        $id=$user->id;*/
        //recherche dans la collone 'id' de la table professeur
        $user=User::find($id);
        $queryProfesseur=Professeur::find($id);
        if (($queryProfesseur != null)&&($user != null)){
            /*récuperer les données à afficher dans un tableau et les envoyer dans une vue */ 
            $data=[
                "identifiant"=> $user->identifiant,
                "name"=> $user->name ,
                "surname"=> $user->surname ,
                "email"=> $user->email ,
                "telephone"=> $user->telephone ,
                "adresse"=> $user->adresse ,
                "dateDeNaissance"=> $user->dateDeNaissance ,
                "specialites"=> $queryProfesseur->specialites ,
                "grade"=> $queryProfesseur->grade ,

            ];
            return response()->json($data);
        }
    }

}
