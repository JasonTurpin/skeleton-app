<?php
/**
 * Factory for generating author records
 * File : database/factories/AuthorFactory.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/database/factories/AuthorFactory.php
 */
namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory for generating author records
 *
 * @author  Jason Turpin <jasonaturpin@gmail.com>
 * @link    https://github.com/JasonTurpin/skeleton-app/blog/main/database/factories/AuthorFactory.php
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory {
    /**
     * Define the model's default state
     *
     * @return array
     */
    public function definition(): array {
        return [
            'name'  => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
