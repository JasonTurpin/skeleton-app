<?php
/**
 * Handler for recipe searches
 * File : app/Services/RecipeFinder/RecipeFinder.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Services/RecipeFinder/RecipeFinder.php
 */
namespace App\Services\RecipeFinder;

use App\Services\Service;
use InvalidArgumentException;
use App\Reports\Recipe\RecipeReport;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Handler for recipe searches
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Services/RecipeFinder/RecipeFinder.php
 */
class RecipeFinder extends Service {
    /**
     * RecipeFinder constructor
     *
     * @param RecipeReport $report The report instance to use for searching recipes
     */
    public function __construct(protected RecipeReport $report) {

    }

    /**
     * Applies a query scope based on the key
     *
     * @param mixed  $value The value to apply to the scope
     * @param string $key   The key that determines which scope to apply
     *
     * @return void
     */
    private function applyQueryScope(mixed $value, string $key): void {
        // IF no value, ignore scope
        if (empty($value)) {
            return;
        }

        // Match the key to the appropriate scope
        match ($key) {
            'email'      => $this->report->applyEmailScope($value),
            'keyword'    => $this->report->applyKeywordScope($value),
            'ingredient' => $this->report->applyIngredientScope($value),
            default      => throw new InvalidArgumentException('Invalid filter: '.$key),
        };
    }

    /**
     * Searches for recipes based on the provided filters
     *
     * @param array $filters  Filters to apply to the search
     * @param int   $perPage  Number of results per page
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filters, int $perPage = 10): LengthAwarePaginator {
        // Apply query scopes
        array_walk($filters, $this->applyQueryScope(...));

        // Loads joiner tables
        $this->report->with(['author', 'ingredients', 'recipeSteps']);

        // Apply order by
        $this->report->orderBy('name');

        // Return paginated results
        return $this->report->paginate($perPage);
    }
}
