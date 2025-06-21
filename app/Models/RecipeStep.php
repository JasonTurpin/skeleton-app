<?php
/**
 * Step for a given recipe
 * File : app/Models/RecipeStep.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Models/RecipeStep.php
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Step for a given recipe
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Models/RecipeStep.php
 */
class RecipeStep extends Model {
    use HasFactory;

    /**
     * Retrieve the recipe that this step belongs to
     *
     * @return BelongsTo
     */
    public function recipe(): BelongsTo {
        return $this->belongsTo(Recipe::class);
    }
}
