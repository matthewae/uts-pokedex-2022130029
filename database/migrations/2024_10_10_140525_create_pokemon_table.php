<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->required();
            $table->string('species', 100)->required();
            $table->string('primary_type', 50)->required();
            $table->decimal('weight', 8, 2)->default(0);
            $table->decimal('height', 8, 2)->default(0);
            $table->Integer('hp')->default(0)->comment('Max 4 digits');
            $table->Integer('attack')->default(0)->comment('Max 4 digits');
            $table->Integer('defense')->default(0)->comment('Max 4 digits');
            $table->boolean('is_legendary')->default(false);
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
