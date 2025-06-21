<?php
/**
 * Generates ingredient records
 * File : database/factories/IngredientFactory.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/database/factories/IngredientFactory.php
 */

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates ingredient records
 *
 * @author  Jason Turpin <jasonaturpin@gmail.com>
 * @link    https://github.com/JasonTurpin/skeleton-app/blob/main/database/factories/IngredientFactory.php
 * @extends Factory<Ingredient>
 */
class IngredientFactory extends Factory {
    /**
     * Define the model's default state
     *
     * @return array
     */
    public function definition(): array {
        return [
            'recipe_id' => Recipe::factory(),
            'name'      => $this->faker->words(3, true),
        ];
    }
}
