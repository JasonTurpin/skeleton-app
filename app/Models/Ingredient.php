<?php
/**
 * Recipe Ingredient
 * File : app/Models/Ingredient.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Models/Ingredient.php
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Recipe Ingredient
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Models/Ingredient.php
 */
class Ingredient extends Model {
    use HasFactory;

    /**
     * Get the recipe that owns the ingredient
     *
     * @return BelongsTo
     */
    public function recipe(): BelongsTo {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Scope a query to search for an author for a given email address
     *
     * @param  Builder $query Query builder
     * @param  string  $term  Search term
     *
     * @return Builder
     */
    public function scopeSearchByName(Builder $query, string $term): Builder {
        return $query->where('name', 'like', '%'.$term.'%');
    }
}
