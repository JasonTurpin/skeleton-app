<?php
/**
 * Fetches recipes
 * File : app/Http/Controllers/Api/RecipesController.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Controllers/Api/RecipesController.php
 */
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeListResource;
use App\Services\RecipeFinder\RecipeFinder;

/**
 * Fetches recipes
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Controllers/Api/RecipesController.php
 */
class RecipesController extends Controller {
    /**
     * Fetches a list of recipes based on search parameters
     *
     * @param Request      $request Request object containing search parameters
     * @param RecipeFinder $finder  The service to find recipes based on search terms
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, RecipeFinder $finder) {
        $searchTerms = $request->only(['email', 'ingredient', 'keyword']);
        return RecipeListResource::collection($finder->search($searchTerms));
    }
}
