<?php
/**
 * Validates recipe listing query parameters
 * File : app/Http/Middleware/ValidateRecipeQuery.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Middleware/ValidateRecipeQuery.php
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Validates recipe listing query parameters
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blob/main/app/Http/Middleware/ValidateRecipeQuery.php
 */
class ValidateRecipeQuery {
    /**
     * Handle an incoming request and validate query parameters.
     *
     * @param Request $request The incoming request
     * @param Closure $next    The next middleware to call
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $validator = Validator::make($request->query(), [
            'email'     => 'nullable|email',
            'ingredient'=> 'nullable|string',
            'keyword'   => 'nullable|string',
            'page'      => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid query parameters.',
                'errors'  => $validator->errors(),
            ], 422);
        }
        return $next($request);
    }
}
