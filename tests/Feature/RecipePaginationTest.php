<?php
/**
 * Tests the recipe search pagination
 * File : tests/Feature/RecipePaginationTest.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/tests/Feature/RecipePaginationTest.php
 */
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Tests the recipe search pagination
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/tests/Feature/RecipePaginationTest.php
 */
class RecipePaginationTest extends TestCase {
    use RefreshDatabase;

    /**
     * Arrange the preconditions for the tests
     *
     * @return void
     */
    protected function setUp(): void {
        parent::setUp();

        // Create an author and associate recipes with them
        $author = Author::factory()->create();
        Recipe::factory()
            ->count(55)
            ->create(['author_id' => $author->id]);
    }

    /** @test */
    public function returns_10_results_on_first_page() {
        $response = $this->getJson('/api/recipes?page=1');
        $response->assertOk();
        $this->assertCount(10, $response->json('data'));
    }

    /** @test */
    public function returns_10_results_on_second_page() {
        $response = $this->getJson('/api/recipes?page=2');
        $response->assertOk();
        $this->assertCount(10, $response->json('data'));
    }

    /** @test */
    public function returns_remaining_results_on_last_page() {
        $response = $this->getJson('/api/recipes?page=6');
        $response->assertOk();
        $this->assertCount(5, $response->json('data')); //
    }

    /** @test */
    public function returns_empty_on_out_of_bounds_page() {
        $response = $this->getJson('/api/recipes?page=100');
        $response->assertOk();
        $this->assertCount(0, $response->json('data'));
    }
}
