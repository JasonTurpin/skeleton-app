<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up(): void {
         Schema::create('recipe_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')
                ->constrained('recipes')
                ->cascadeOnDelete();
            $table->text('content');
            $table->unsignedInteger('order_number');  // Tracks which step number in the recipe sequence
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Indexes the order number to improve sorting efficiency
            $table->index(['recipe_id', 'order_number'], 'idx_recipe_order');
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('recipe_steps');
    }
};
