<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\InnovationController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActualiteController;
//Site e-commerce
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProduitController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [AdminController::class,'dashboard']);
Route::get('/charts', [AdminController::class,'charts']);



Route::get('/sliders', [SlidersController::class,'sliders']);
Route::get('/ajouter-sliders', [SlidersController::class,'add']);
Route::post('/sauver-sliders', [SlidersController::class,'save'])->name('save');
Route::get('/edits-sliders/{id}', [SlidersController::class,'edits']);
Route::post('/modifier-sliders/{id}', [SlidersController::class,'update']);
Route::get('/delete-sliders/{id}', [SlidersController::class,'delete']);
Route::get('/desactiver-sliders/{id}', [SlidersController::class,'desactiver']);
Route::get('/activer-sliders/{id}', [SlidersController::class,'activer']);




Route::get('/header', [HeaderController::class,'header']);
Route::get('/ajouter-header', [HeaderController::class,'add']);
Route::post('/sauver-header', [HeaderController::class,'save'])->name('save');
Route::get('/edits-header/{id}', [HeaderController::class,'edits']);
Route::post('/modifier-header/{id}', [HeaderController::class,'update']);
Route::get('/delete-header/{id}', [HeaderController::class,'delete']);
Route::get('/desactiver-header/{id}', [HeaderController::class,'desactiver']);
Route::get('/activer-header/{id}', [HeaderController::class,'activer']);



Route::get('/innovation', [InnovationController::class,'innovation']);
Route::get('/ajouter-innovation', [InnovationController::class,'add']);
Route::post('/sauver-innovation', [InnovationController::class,'save'])->name('save');
Route::get('/edits-innovation/{id}', [InnovationController::class,'edits']);
Route::post('/modifier-innovation/{id}', [InnovationController::class,'update']);
Route::get('/delete-innovation/{id}', [InnovationController::class,'delete']);
Route::get('/desactiver-innovation/{id}', [InnovationController::class,'desactiver']);
Route::get('/activer-innovation/{id}', [InnovationController::class,'activer']);



Route::get('/ajouter-equipe', [EquipeController::class,'add']);
Route::post('/sauver-equipe', [EquipeController::class,'save'])->name('save');
Route::get('/edits-equipe/{id}', [EquipeController::class,'edits']);
Route::post('/modifier-equipe/{id}', [EquipeController::class,'update']);
Route::get('/delete-equipe/{id}', [EquipeController::class,'delete']);
Route::get('/desactiver-equipe/{id}', [EquipeController::class,'desactiver']);
Route::get('/activer-equipe/{id}', [EquipeController::class,'activer']);
Route::get('/equipe', [EquipeController::class,'equipe']);





Route::get('/actualite', [ActualiteController::class,'actualite']);
Route::get('/ajouter-actualite', [ActualiteController::class,'add']);
Route::post('/sauver-actualite', [ActualiteController::class,'save'])->name('save');
Route::get('/edits-actualite/{id}', [ActualiteController::class,'edits']);
Route::post('/modifier-actualite/{id}', [ActualiteController::class,'update']);
Route::get('/delete-actualite/{id}', [ActualiteController::class,'delete']);
Route::get('/desactiver-actualite/{id}', [ActualiteController::class,'desactiver']);
Route::get('/activer-actualite/{id}', [ActualiteController::class,'activer']);




//Partie du site e-commerce

Route::get('/categorie', [CategoryController::class,'categorie']);
Route::get('/ajouter-categorie', [CategoryController::class,'add']);
Route::post('/sauver-categorie', [CategoryController::class,'save'])->name('save');
Route::get('/edits-categorie/{id}', [CategoryController::class,'edits']);
Route::post('/modifier-categorie/{id}', [CategoryController::class,'update']);
Route::get('/delete-categorie/{id}', [CategoryController::class,'delete']);
Route::get('/desactiver-categorie/{id}', [CategoryController::class,'desactiver']);
Route::get('/activer-categorie/{id}', [CategoryController::class,'activer']);



Route::get('/produit', [ProduitController::class,'produit']);
Route::get('/ajouter-produit', [ProduitController::class,'add']);
Route::post('/sauver-produit', [ProduitController::class,'save'])->name('save');
Route::get('/edits-produit/{id}', [ProduitController::class,'edits']);
Route::post('/modifier-produit/{id}', [ProduitController::class,'update']);
Route::get('/delete-produit/{id}', [ProduitController::class,'delete']);
Route::get('/desactiver-produit/{id}', [ProduitController::class,'desactiver']);
Route::get('/activer-produit/{id}', [ProduitController::class,'activer']);



