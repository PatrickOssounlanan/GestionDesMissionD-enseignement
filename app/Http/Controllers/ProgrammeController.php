<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ProgrammeController extends Controller
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
            return view('/tableAdmin',[
                'profile'=>$profile,
            ]);
        }else{  
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $sqlTable= "select * from tableau_enseignants where nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);

            $totalP=0;
            $totalE=0;
            $dif=0;

            foreach($table2 as $table2){
                $totalP+=$table2->mp;
                $totalE+=$table2->me;
            }

            $dif=$totalP-$totalE;
            

            return view('table',[
                'table'=> $table,
                'mp'=> $totalP,
                'dif'=> $dif,
            ]);
        }
    }
    public function traitement(){
        if(Auth::user()->email=='admin@insti.com'){
            $profile=profile::all();
            // $profileTrait=$profile;
            $lastvalue=request('selectNom');
            if($lastvalue=="*"){
                $profileTrait=$profile;
            }else{
                $profileTrait=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            }
            
            return view('/tableAdmin',[
                'profile'=>$profile,
                'lv'=>$lastvalue,
                'profileTrait'=>$profileTrait
            ]);
        }else{  
            $profil=DB::table('profiles')->where('nom',Auth::user()->id)->first();
            $sqlTable= "select * from tableau_enseignants where nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);

            $totalP=0;
            $totalE=0;
            $dif=0;

            foreach($table2 as $table2){
                $totalP+=$table2->mp;
                $totalE+=$table2->me;
            }

            $dif=$totalP-$totalE;
            

            return view('table',[
                'table'=> $table,
                'mp'=> $totalP,
                'dif'=> $dif,
            ]);
        }
    }

    public function generate(){
        if(Auth::user()->email=='admin@insti.com'){
            $profile=profile::all();
            
            $profileTrait=$profile;
            
            return PDF::loadView('tablePdf',[
                'profile'=>$profile,
                'lv'=>request('selectNom'),
                'profileTrait'=>$profileTrait
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }else{
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();

            $sqlTable= "select * from tableau_enseignants where nom_enseignant ='"."".$profil->nom." ".$profil->prenom."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);

            $totalP=0;
            $totalE=0;
            $dif=0;

            foreach($table2 as $table2){
                $totalP+=$table2->mp;
                $totalE+=$table2->me;
            }

            $dif=$totalP-$totalE;
            return PDF::loadView('tablePdf',[
                'table'=> $table,
                'mp'=> $totalP,
                'dif'=> $dif,
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        

    }
    
}
