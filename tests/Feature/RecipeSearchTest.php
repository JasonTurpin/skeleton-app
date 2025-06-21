<?php
/**
 * Tests the recipe search feature
 * File : tests/Feature/RecipeSearchTest.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/tests/Feature/RecipeSearchTest.php
 */
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeStep;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Tests the recipe search feature
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/tests/Feature/RecipeSearchTest.php
 */
class RecipeSearchTest extends TestCase {
    use RefreshDatabase;

    /**
     * Arrange the preconditions for the tests
     *
     * @return void
     */
    protected function setUp(): void {
        parent::setUp();

        $this->setupARecipes();
        $this->setupBRecipes();
    }

    /**
     * Set up recipes for author A
     *
     * @return void
     */
    protected function setupARecipes(): void {
        $authorA = Author::factory()->create(['email' => 'a@example.com']);
        $recipeA = Recipe::factory()->create([
            'name'        => 'Poached Cod',
            'description' => 'Delicate cod in broth',
            'author_id'   => $authorA->id,
        ]);
        Ingredient::factory()->create(['recipe_id' => $recipeA->id, 'name' => '1 lemon, sliced']);
        RecipeStep::factory()->create([
            'recipe_id'    => $recipeA->id,
            'content'      => 'Poach cod in lemon broth for 10 minutes',
            'order_number' => 1,
        ]);

        $recipeB = Recipe::factory()->create([
            'name'        => 'Wild Cod in White Wine Sauce',
            'description' => 'Pan-seared cod with a white wine butter reduction.',
            'author_id'   => $authorA->id,
        ]);
        Ingredient::factory()->create(['recipe_id' => $recipeB->id, 'name' => '2 tablespoons olive oil']);
        Ingredient::factory()->create(['recipe_id' => $recipeB->id, 'name' => 'Butter']);
        RecipeStep::factory()->create([
            'recipe_id'    => $recipeA->id,
            'content'      => 'Preheat grill to medium-high heat.',
            'order_number' => 1,
        ]);
    }

    /**
     * Set up recipes for author B
     *
     * @return void
     */
    protected function setupBRecipes(): void {
        $authorB = Author::factory()->create(['email' => 'b@example.com']);
        $recipeB = Recipe::factory()->create([
            'name'        => 'Grilled Salmon',
            'description' => 'Smoky salmon fillet',
            'author_id'   => $authorB->id,
        ]);
        Ingredient::factory()->create(['recipe_id' => $recipeB->id, 'name' => 'Salmon']);
        Ingredient::factory()->create(['recipe_id' => $recipeB->id, 'name' => 'Butter']);
        RecipeStep::factory()->create([
            'recipe_id'    => $recipeB->id,
            'content'      => 'Grill salmon for 8 minutes',
            'order_number' => 1,
        ]);
    }

    /**
     * Data provider for search query tests
     *
     * @return array
     */
    public static function searchQueryProvider(): array {
        return [
            // One filter tests
            'filter by email A' => [
                ['email' => 'a@example.com'], 2, ['author_email' => 'a@example.com'], ['author_email' => 'b@example.com']
            ],
            'filter by ingredient olive oil' => [
                ['ingredient' => 'olive oil'], 1, ['name' => 'Wild Cod in White Wine Sauce']
            ],
            'filter by description as keyword Smoky salmon' => [
                ['keyword' => 'Smoky salmon'], 1, ['name' => 'Grilled Salmon']
            ],
            'filter by step as keyword Grill salmon' => [
                ['keyword' => 'Grill salmon'], 1, ['name' => 'Grilled Salmon']
            ],
            'filter by name as keyword Cod' => [
                ['keyword' => 'Cod'], 2, ['author_email' => 'a@example.com'], ['author_email' => 'b@example.com']
            ],
            'filter by ingredient as keyword olive oil' => [
                ['keyword' => 'olive oil'], 1, ['name' => 'Wild Cod in White Wine Sauce']
            ],

            // Combo tests
            'filter by ingredient Butter + email A' => [
                ['ingredient' => 'Butter', 'email' => 'a@example.com'], 1, ['name' => 'Wild Cod in White Wine Sauce']
            ],
            'filter by keyword Delicate Cod + email A' => [
                ['keyword' => 'Delicate cod', 'email' => 'a@example.com'], 1, ['name' => 'Poached Cod']
            ],
            'filter by keyword Grill + email A' => [
                ['keyword' => 'Grill', 'email' => 'a@example.com'], 1, ['name' => 'Poached Cod']
            ],
            'filter by name as keyword Cod + email A' => [
                ['keyword' => 'Cod', 'email' => 'a@example.com'], 2, ['author_email' => 'a@example.com'], ['author_email' => 'b@example.com']
            ],

            // 3 combo tests
            'filter by keyword Cod + email A + ingredient lemon' => [
                ['keyword' => 'Cod', 'email' => 'a@example.com', 'ingredient' => 'lemon'], 1, ['name' => 'Poached Cod']
            ],
        ];
    }

    /**
     * This method uses data provider to test various combinations of search queries
     *
     * @param array      $queryParams      The query parameters to test
     * @param int        $expectedCount    The expected number of results
     * @param array|null $expectedFragment The expected JSON fragment to be present in the response
     * @param array|null $missingFragment  The JSON fragment that should be missing in the response
     *
     * @test
     * @dataProvider searchQueryProvider
     */
    public function recipe_search_combinations(
        array $queryParams,
        int $expectedCount,
        ?array $expectedFragment,
        ?array $missingFragment = null
    )  {
        $query    = http_build_query($queryParams);
        $response = $this->getJson('/api/recipes?'.$query);
        $response->assertOk();

        // Assert count matches
        $this->assertCount($expectedCount, $response->json('data'), 'Failed on query: '.json_encode($queryParams));

        // IF expected fragment is not empty
        if ($expectedFragment) {
            $response->assertJsonFragment($expectedFragment);

        // Ensure no matching fragment if expecting zero results
        } else {
            $this->assertEmpty($response->json('data'));
        }

        // IF the count is greater than 1, run the missing fragment test
        if ($expectedCount > 1) {
            $response->assertJsonMissing($missingFragment);
        }
    }
}
