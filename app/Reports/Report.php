<?php
/**
 * Parent report
 * File : app/Reports/Report.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Reports/Report.php
 */
namespace App\Reports;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Parent report
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/app/Reports/Report.php
 */
abstract class Report {
    protected Builder $query;

    /**
     * Report constructor
     */
    public function __construct() {
        $this->initializeQuery();
    }

    /**
     * Subclasses define which model to use
     *
     * @return string
     */
    abstract protected function model(): string;

    /**
     * Sets query builder
     *
     * @return void
     */
    protected function initializeQuery(): void {
        $this->query = app($this->model())::query();
    }

    /**
     * Runs the report
     *
     * @return Collection|array
     */
    public function get(): Collection|array {
        return $this->query->get();
    }

    /**
     * Return the underlying query builder
     *
     * @return Builder
     */
    public function builder(): Builder {
        return $this->query;
    }

    /**
     * Paginate the results of the report
     *
     * @param int $perPage Number of items per page
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator {
        return $this->query->paginate($perPage);
    }

    /**
     * Add eager-loaded relationships
     *
     * @param array $relations Array of relationships to eager load
     *
     * @return Builder
     */
    public function with(array $relations): Builder {
        return $this->query->with($relations);
    }

    /**
     * Apply ordering
     *
     * @param string $column    Column to order by
     * @param string $direction Direction of the order (asc or desc)
     *
     * @return Builder
     */
    public function orderBy(string $column, string $direction = 'asc'): Builder {
        return $this->query->orderBy($column, $direction);
    }
}
