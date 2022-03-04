<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddProfController extends Controller
{
    public function affichage()
    {
        if(auth()->guest()){
            return view('index', [
                'vTitle'=> 'Connexion'
            ]);
        }
    	return view('addProf',[
    		'vtitle'=>'ajouter',
    	]);
    }
    public function traitement()
    {

        $compteur= request('compteur');
        $nombreSucces=$compteur+1;
        $errors= [];

        for($i=0; $i<=$compteur; $i++){
            //verifions si les eléments saisie n'etais pas enregistrer
            $compteExistant=false;
            $allUser= users::all();
            

            foreach($allUser as $user ){
                if(($user->email)==request('email'.$i)){
                    $compteExistant=true;
                    array_push($errors, "Un compte existe déjà avec l'email ".request('email'.$i));
                    $nombreSucces--;
                }
            }
            if($compteur==null){
                return back();
            }
            if(!$compteExistant){
                $Users=DB::table('users')->insert([
                    'email'=>request('email'.$i),
                    'password'=>bcrypt(request('pass'.$i)),
                    'statut_id'=>1,
                    'usergroup_id'=>5,
                ]);
                $id=DB::getPdo()->lastInsertId();
                $profile=DB::table('profiles')->insert([
                    'user_id'=>$id,
                    'nom'=>request('first_name'.$i),
                    'prenom'=>request('last_name'.$i),
                    'genre'=>request('genre'.$i),
                    'birthday'=>request('date'.$i),
                    'lieu_naissance'=>request('lieu_naissance'.$i),
                    'diplome'=>request('diplome'.$i),
                    'num_mat'=>request('matricule'.$i),
                    'num_tel'=>request('num'.$i),
                    'adresse'=>request('adresse'.$i),
                    'grade'=>request('type'.$i),
                ]);
            }

        }

        flash($nombreSucces.'/'.($compteur+1).' enrégistrement(s) réussit')->success();
        foreach ($errors as $errors){
            flash($errors)->error();
        }
        return view('addProf',[
    		'vtitle'=>'ajouter',
    	]);
        

    }
}
