<?php
/**
 * Generates a step for a recipe
 * File : database/factories/RecipeStepFactory.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/database/factories/RecipeStepFactory.php
 */

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\RecipeStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates a step for a recipe
 *
 * @author  Jason Turpin <jasonaturpin@gmail.com>
 * @link    https://github.com/JasonTurpin/skeleton-app/blob/main/database/factories/RecipeStepFactory.php
 * @extends Factory<RecipeStep>
 */
class RecipeStepFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'recipe_id' => Recipe::factory(),
            'content'   => $this->faker->sentence,
        ];
    }
}
