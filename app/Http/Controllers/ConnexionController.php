<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class connexionController extends Controller
{
    public function affichage(){
        if(!auth()->guest()){
            return view('table', [
                'vTitle'=> 'Connexion'
            ]);
        }
        return view('index', [
            'vTitle'=> 'Connexion'
        ]);
    }

    public  function traitement(){
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
    
        if(auth::attempt([
            'email'=>request('email'),
            'password'=>request('password')
        ])){
            return redirect('/programme');
        }else{
            return back()->withErrors(['password'=> 'Vos identifiants sont incorrect',])->withInput(['email']);
        }
    }
    public function deconnexion(){
        auth::logout();

        return redirect('/');

    }
}
