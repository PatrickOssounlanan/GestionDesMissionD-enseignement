<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'App\Http\Controllers\ConnexionController@affichage');
Route::get('/deconnexion', 'App\Http\Controllers\ConnexionController@deconnexion');
Route::post('/', 'App\Http\Controllers\ConnexionController@traitement');

Route::view('/programmerCours','addCours');
Route::get('/ajouterProf','App\Http\Controllers\AddProfController@affichage');
Route::post('/ajouterProf','App\Http\Controllers\AddProfController@traitement');
Route::get('/programmerMission','App\Http\Controllers\AddMissionController@affichage');
Route::post('/programmerMission','App\Http\Controllers\AddMissionController@traitement');
Route::get('/programmerCours','App\Http\Controllers\AddCoursController@affichage');
Route::post('/programmerCours','App\Http\Controllers\AddCoursController@traitement');
Route::get('/profile','App\Http\Controllers\ProfileController@affichage');
Route::post('/profilPass','App\Http\Controllers\ProfileController@traitement1');
Route::post('/profilInfo','App\Http\Controllers\ProfileController@traitement2');
Route::get('/programme','App\Http\Controllers\ProgrammeController@affichage');
Route::post('/programme','App\Http\Controllers\ProgrammeController@traitement');
Route::get('/mission','App\Http\Controllers\MissionController@affichage');
Route::post('/mission','App\Http\Controllers\MissionController@traitement');
Route::get('/pdfM', 'App\Http\Controllers\MissionController@generate')->name('pdf');
Route::get('/pdfT', 'App\Http\Controllers\ProgrammeController@generate')->name('pdf');
Route::post('image-upload','App\Http\Controllers\ImageUploadController@imageUploadPost')
        ->name('image.upload.post');