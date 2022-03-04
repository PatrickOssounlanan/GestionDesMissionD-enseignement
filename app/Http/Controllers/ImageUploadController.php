<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Cache\Store;

class ImageUploadController extends Controller

{
    public function imageUploadPost(Request $request)

    {

        $result=$request->validate([

            'imageUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $result? flash('Photo de profil modifier avec succès')->success(): flash('Veillez importer une image de moins de 2Mo')->error();

        $imageName = Auth::user()->email;
        $filename=$imageName.'.'.$request->imageUpload->extension(); 
        $path=$request->imageUpload->move(
            'assets/img',
            $filename,
        );
        $profilImage=DB::table('profiles')->where('user_id',Auth::user()->id)->update([
           'image'=>$path,
       ]); 

        return back();

    }
}
