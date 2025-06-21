<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\RecipesController;

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

Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('api.recipes.show');
Route::get('/recipes', [RecipesController::class, 'index'])->middleware('recipe.query')->name('api.recipes.index');
