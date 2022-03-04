<?php

namespace App\Http\Controllers;

use App\Models\GroupePedagogique;
use App\Models\profile;
use App\Models\qualite;
use App\Models\UE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddMissionController extends Controller
{
    public function affichage(){
        $profile=profile::all();
        $qualite=qualite::all();
        $ue=UE::all();
        $group=GroupePedagogique::all();
         return view('addMission',[
             'vtitle'=>'Mission',
             'profile'=>$profile,
             'qualite'=>$qualite,
             'ue'=>$ue,
             'group'=>$group,
         ]);
    }
    public function traitement()
    {
    $compteur= request('compteur');
    $nombreSucces=0;

    for($i=0; $i<=$compteur; $i++){
        if(request('adresse_complet'.$i)!=null){
            DB::table('tableau_missions')->insert([
                'Nom_enseignant'=> request('selectNom'.$i),
                 'qualite'=>request('selectQualite'.$i),
                 'adressse'=>request('adresse_complet'.$i),
                 'date_naissance'=>request('date_naissance'.$i),
                 'lieu'=>request('lieu'.$i),
                 'nationalite'=>request('Nationalite'.$i),
                 'Maticule'=>request('matricul'.$i),
                 'grade'=>request('grade'.$i),
                 'Ue'=>request('selectUE'.$i),
                 'Groupe_Pedagogique'=>request('selectGPE'.$i),
                 'Annee_academique'=>request('Annee_academique'.$i),
                 'missionHeure'=>request('heure_UE'.$i),
                 'missionDuree'=>request('dure_mission'.$i),
                 'dateJourArrive'=>request('dure_jourArrive'.$i),
                 'dateJourRetour'=>request('dure_jourRetour'.$i),
                ]);
                $nombreSucces++;
            }
        }
        flash($nombreSucces.' enrégistrement(s) réussit')->success();
        $profile=profile::all();
        $qualite=qualite::all();
        $ue=UE::all();
        $group=GroupePedagogique::all();
        return view('addMission',[
            'vtitle'=>'Mission',
            'profile'=>$profile,
            'qualite'=>$qualite,
            'ue'=>$ue,
            'group'=>$group,
        ]);
    }
    

}
