<?php
/**
 * Observes events in recipe
 * File : app/Observers/RecipeObserver.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Observers/RecipeObserver.php
 */

namespace App\Observers;

use App\Models\Recipe;
use Illuminate\Support\Str;

/**
 * Observes events in recipe
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Observers/RecipeObserver.php
 */
class RecipeObserver {
    /**
     * Handle the Recipe "creating" event.
     *
     * @param Recipe $recipe Active record
     *
     * @return void
     */
    public function creating(Recipe $recipe): void {
        $recipe->slug = $this->generateUniqueSlug($recipe->name);
    }

    /**
     * Generates a unique slug for the recipe
     *
     * @param string $name Slug name
     *
     * @return string
     */
    protected function generateUniqueSlug(string $name): string {
        // Generates a slug
        $baseSlug = Str::slug($name);
        $slug     = $baseSlug;
        $count    = 1;

        // IF slug already exists, append a count to the slug
        while (Recipe::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$count++;
        }
        return $slug;
    }
}
