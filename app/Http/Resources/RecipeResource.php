<?php
/**
 * Formats response for recipe
 * File : app/Http/Resources/RecipeResource.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Resources/RecipeResource.php
 */
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Formats response for recipe
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Resources/RecipeResource.php
 */
class RecipeResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        // In case we want additional info about the author added in later
        $authorDetails = [
            'email' => $this->author->email,
        ];

        // Step details
        $steps = $this->recipeSteps->map(function($step) {;
            return [
                'content'      => $step->content,
                'order_number' => $step->order_number,  // Will already be ordered, but pass it so front end keeps sanity
            ];
        });

        // Return resource data in a structured format
        return [
            'author'      => $authorDetails,
            'description' => $this->description,
            'ingredients' => $this->ingredients->pluck('name'),
            'name'        => $this->name,
            'slug'        => $this->slug,
            'steps'       => $steps,
        ];
    }
}
