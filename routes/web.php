<?php

use Illuminate\Support\Facades\Route;
use App\Models\Filiere;
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

Route::get('/', function () {
    return view('Home');
});
Route::get('Home', function () {
    return view('Home');
});
Route::get('/ListeEtudaint', 'EtudaintController@index');
Route::get('/ListeFiliere', 'FiliereController@index');

Route::post('/Filiere/edit/{id}','FiliereController@edit');
Route::post('/Etudaint/edit/{id}','EtudaintController@edit');

Route::post('/Etudaint/CreateE/{id}','EtudaintController@createE');

Route::get('/Filiere/pdf/{id}','FiliereController@pdf');
Route::get('/Etudaint/pdf','EtudaintController@pdf');

Route::get('/Filiere/show/{id}','FiliereController@show');
Route::get('/Etudaint/show/{id}','EtudaintController@show');


Route::get('/Filiere/delete/{id}','FiliereController@destroy');
Route::get('/Etudaint/delete/{id}','EtudaintController@destroy');

Route::resource('/Etudaint',EtudaintController::class);
Route::resource('/Filiere',FiliereController::class);

