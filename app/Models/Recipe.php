<?php
/**
 * Recipe
 * File : app/Models/Recipe.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Models/Recipe.php
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Recipe
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Models/Recipe.php
 */
class Recipe extends Model {
    use HasFactory;

    /**
     * Get the route key for the model
     *
     * @return string
     */
    public function getRouteKeyName(): string {
        return 'slug';
    }

    /**
     * Get the author of the recipe
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the ingredients for the recipe
     *
     * @return HasMany
     */
    public function ingredients(): HasMany {
        return $this->hasMany(Ingredient::class);
    }

    /**
     * Get the steps for the recipe
     *
     * @return HasMany
     */
    public function recipeSteps(): HasMany {
        return $this->hasMany(RecipeStep::class)->orderBy('order_number');
    }
}
