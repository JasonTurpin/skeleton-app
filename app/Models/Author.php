<?php
/**
 * Recipe Author
 * File : app/Models/Author.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Models/Author.php
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Recipe Author
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Models/Author.php
 */
class Author extends Model {
    use HasFactory;

    /**
     * Get the recipes authored by this author
     *
     * @return HasMany
     */
    public function recipes(): HasMany {
        return $this->hasMany(Recipe::class);
    }

    /**
     * Scope a query to search for an author for a given email address
     *
     * @param  Builder $query Query builder
     * @param  string  $email Email address to search for
     *
     * @return Builder
     */
    public function scopeByEmail(Builder $query, string $email): Builder {
        return $query->where('email', $email);
    }
}
