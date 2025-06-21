<?php
/**
 * Formats the response for the recipe listing
 * File : app/Http/Resources/RecipeListResource.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Http/Resources/RecipeListResource.php
 */
namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Formats the response for the recipe listing
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Http/Resources/RecipeListResource.php
 */
class RecipeListResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'name'         => $this->name,
            'slug'         => $this->slug,
            'description'  => Str::limit($this->description, 120),
            'author_email' => $this->author->email ?? null,
        ];
    }
}
