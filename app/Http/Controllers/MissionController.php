<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade as PDF;

class MissionController extends Controller
{

    public function affichage()
    {
        if(auth()->guest()){
            return view('index', [
                'vTitle'=> 'Connexion'
            ]);
        }
        if(Auth::user()->email=='admin@insti.com'){
            $profile=profile::all();
            return view('missionAdmin', [
                'profile'=>$profile,
            ]);
        }else{

            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);


            return view('mission',[
                'table'=> $table,
            ]);
        }

    }

    public function traitement(){
        if(Auth::user()->email=='admin@insti.com'){
            $profile=profile::all();

            $lastvalue=request('selectNomA');
            if($lastvalue=="*"){
                $profileTrait=$profile;
            }else{
                $profileTrait=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            }
            return view('missionAdmin',[
                'profile'=>$profile,
                'lv'=>$lastvalue,
                'profileTrait'=>$profileTrait
            ]);
            // return $this->lastvalue;
        }else{
            $profil=DB::table('profiles')->where('nom',Auth::user()->id)->first();
            $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);

            return view('mission',[
                'table'=> $table,
            ]);
        }
    }
    public function generate(){
        if(Auth::user()->email=='admin@insti.com'){
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $profile=profile::all();
            $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);
            
            if(request('selectNom')=="*"){
                $profileTrait=$profile;
            }
            
            $profileTrait=$profile;
            return PDF::loadView('missionPdf',[
                'profile'=>$profile,
                'lv'=>request('selectNom'),
                'profileTrait'=>$profileTrait,
            ])->setPaper('a2', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        else{
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
   
            $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);
    
            return PDF::loadView('missionPdf',[
            'table'=>$table,
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        
   
    }

}
