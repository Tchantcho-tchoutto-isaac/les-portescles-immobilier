<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route pour afficher la liste des articles
Route::get('/articles', [ArticleController::class, 'index']);

// Route pour afficher un article spécifique
Route::get('/articles/{article}', [ArticleController::class, 'show']);

// Route pour afficher le formulaire de création d'un nouvel article
Route::get('/articles/create', [ArticleController::class, 'create']);

// Route pour traiter la soumission du formulaire de création d'un nouvel article
Route::post('/articles', [ArticleController::class, 'store']);

// Route pour afficher le formulaire de modification d'un article existant
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);

// Route pour traiter la soumission du formulaire de modification d'un article existant
Route::put('/articles/{article}', [ArticleController::class, 'update']);

// Route pour supprimer un article existant
Route::delete('/articles/{article}', [ArticleController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

