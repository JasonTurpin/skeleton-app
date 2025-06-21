<?php
/**
 * Fetches a recipe
 * File : app/Http/Controllers/Api/RecipeController.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Controllers/Api/RecipeController.php
 */
namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;

/**
 * Fetches a recipe
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Controllers/Api/RecipeController.php
 */
class RecipeController extends Controller {
    /**
     * Fetches a recipe
     *
     * @param Recipe $recipe Recipe to fetch
     *
     * @return RecipeResource
     */
    public function show(Recipe $recipe): RecipeResource {
        $recipe->load(['author', 'ingredients', 'recipeSteps']);
        return new RecipeResource($recipe);
    }
}
