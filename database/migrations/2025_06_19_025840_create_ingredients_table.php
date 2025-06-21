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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')
                ->constrained('recipes')
                ->cascadeOnDelete();
            $table->string('name');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('ingredients');
    }
};
