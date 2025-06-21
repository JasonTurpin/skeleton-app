<?php
/**
 * Generates recipe records
 * File : database/factories/RecipeFactory.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/database/factories/RecipeFactory.php
 */

namespace Database\Factories;

use App\Models\Author;
use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates recipe records
 *
 * @author  Jason Turpin <jasonaturpin@gmail.com>
 * @link    https://github.com/JasonTurpin/skeleton-app/blob/main/database/factories/RecipeFactory.php
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $name = $this->faker->sentence(3);
        return [
            'author_id'   => Author::factory(),
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => $this->faker->paragraph,
        ];
    }
}
