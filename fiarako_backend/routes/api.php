<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CarburantController;
use App\Http\Controllers\CarrosserieController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\TriController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('utilisateurs', UtilisateurController::class);
Route::apiResource('carburants', CarburantController::class);
Route::apiResource('carrosseries', CarrosserieController::class);
Route::apiResource('couleurs', CouleurController::class);
Route::apiResource('enregistrements', EnregistrementController::class);
Route::apiResource('images', ImageController::class);
Route::apiResource('marques', MarqueController::class);
Route::apiResource('modeles', ModeleController::class);
Route::apiResource('offres', OffreController::class);
Route::apiResource('transmissions', TransmissionController::class);
Route::apiResource('vues', VueController::class);
Route::apiResource('annonces', AnnonceController::class);
// Route::get('api/annonces', [AnnonceController::class, 'getFilteredAnnonces']);
Route::get('modeles/marques/{marque_id}', [ModeleController::class, 'getByMarque']);
Route::get('tris', [TriController::class, 'index']);
Route::get('carrosseries_motos', [CarrosserieController::class, 'getAllisMoto']);
Route::get('annonces_motos', [AnnonceController::class, 'getFilteredAnnoncesMoto']);
