<?php
/**
 * Used to see large amounts of recipes in the database
 * File : database/seeders/LargeRecipeSeeder.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/database/seeders/LargeRecipeSeeder.php
 */
namespace Database\Seeders;

use App\Models\Author;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeStep;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Used to see large amounts of recipes in the database
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/database/seeders/LargeRecipeSeeder.php
 */
class LargeRecipeSeeder extends Seeder {
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run(): void {
        $this->createAuthors();
        $this->createRecipes();
        $this->createRecipeContents();
    }

    /**
     * Helper function that ensures that the factory data is unique based on a specific key
     *
     * @param Factory $factory   Factory to use for creating items
     * @param int     $count     Number of items to create
     * @param string  $uniqueKey Index key that must be unique
     * @param array   $overrides Overrides factory values
     * @param array   $seen      Indexes already been seen
     *
     * @return array
     */
    protected function ensureUniqueFactoryData(
        Factory $factory,
        int $count,
        string $uniqueKey,
        array $overrides = [],
        array &$seen = []
    ): array {
        // Initialize
        $items = [];

        // Ensures we have unique key data for the dataset
        while (count($items) < $count) {
            $model = $factory->make($overrides);
            $value = $model->{$uniqueKey};

            if (isset($seen[$value])) {
                continue;
            }

            $seen[$value] = true;
            $items[]      = $model->getAttributes();
        }
        return $items;
    }

    /**
     * Create a large number of authors
     *
     * @return void
     */
    protected function createAuthors(): void {
        $authors = $this->ensureUniqueFactoryData(Author::factory(), 100, 'email');
        Author::insert($authors);
    }

    /**
     * Create a large number of recipes
     *
     * @return void
     */
    protected function createRecipes(): void {
        $seen     = [];
        $recipes  = [];
        $authorIds = Author::pluck('id')->toArray();

        foreach ($authorIds as $authorId) {
            $authorRecipes = $this->ensureUniqueFactoryData(
                Recipe::factory(),
                rand(5, 12),
                'slug',
                ['author_id' => $authorId],
                $seen
            );

            $recipes = array_merge($recipes, $authorRecipes);
        }

        $insertChunks = array_chunk($recipes, 100);
        array_walk($insertChunks, Recipe::insert(...));
    }

    /**
     * Create a large number of ingredients and steps for each recipe
     *
     * @return void
     */
    protected function createRecipeContents(): void {
        // Initialize
        $ingredients = [];
        $steps       = [];

        // Iterates through each recipe and generates ingredients and steps
        Recipe::pluck('id')->each(function($recipeId) use (&$ingredients, &$steps) {
            // Generates a random number of ingredients
            $ingredientCount = rand(5, 12);
            while ($ingredientCount-- > 0) {
                $ingredients[] = Ingredient::factory()->make(['recipe_id' => $recipeId])->getAttributes();
            }

            // Generates a random number of steps
            $stepCount = rand(3, 8);
            $count     = 0;
            while (++$count <= $stepCount) {
                $steps[] = RecipeStep::factory()->make([
                    'recipe_id'    => $recipeId,
                    'order_number' => $count,
                ])->getAttributes();
            }
        });

        // Breaks the inserts up into chunks so query doesn't get too large
        $ingredientChunks = array_chunk($ingredients, 100);
        $stepChunks       = array_chunk($steps, 100);

        // Runs inserts
        array_walk($ingredientChunks, Ingredient::insert(...));
        array_walk($stepChunks, RecipeStep::insert(...));
    }
}
