<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class ProfileController extends Controller
{
    public function affichage()
    {
        if(auth()->guest()){
            return view('index', [
                'vTitle'=> 'Connexion'
            ]);
        }
    	return view('profile',[
    		'vtitle'=>'Profil',
    	]);
    }
    public function traitement1()
    {
        $pass =Auth::user()->password;
        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' =>['required']
        ]);

        DB::table('users')->where('id',Auth::user()->id)->update(['password' => bcrypt(request('password'))]);

        flash('Mot de passe changer avec succès')->success();

        return view('profile',[
            'vtitle'=>'Profil',
        ]);
        
    }

    public function traitement2()
    {
        DB::table('profiles')->where('user_id',Auth::user()->id)->update([
            'nom'=>request('first_name'),
            'prenom'=>request('last_name'),
            'birthday'=>request('birthday'),
            'num_mat'=>request('mat'),
            'num_tel'=>request('phone'),
            'adresse'=>request('adresse')
        ]);
        flash('Mise à jour de vos informations effectuées')->success();
        return view('profile',[
            'vtitle'=>'Profil',
        ]);
        
    }
}
