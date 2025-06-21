<?php
/**
 * Recipe report
 * File : app/Reports/Recipe/RecipeReport.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Reports/Recipe/RecipeReport.php
 */
namespace App\Reports\Recipe;

use App\Models\Recipe;
use App\Reports\Report;

/**
 * Recipe report
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Reports/Recipe/RecipeReport.php
 */
class RecipeReport extends Report {
    /**
     * Defines subclass model
     *
     * @return string
     */
    protected function model(): string {
        return Recipe::class;
    }

    /**
     * Applies the email scope
     *
     * @param string $email Email of the author
     *
     * @return void
     */
    public function applyEmailScope(string $email): void {
        $this->query->whereHas('author', fn($query) => $query->byEmail($email));
    }

    /**
     * @param string $ingredient
     * @return void
     */
    public function applyIngredientScope(string $ingredient): void {
        $this->query->whereHas('ingredients', fn($query) => $query->searchByName($ingredient));
    }

    /**
     * Applies the keyword scope
     *
     * @param string $search Search term
     *
     * @return void
     */
    public function applyKeywordScope(string $search): void {
        $this->query->where(function($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhereHas('ingredients', fn($q) => $q->searchByName($search))
                ->orWhereHas('recipeSteps', fn($q) => $q->where('content', 'like', '%'.$search.'%'));
        });
    }
}
