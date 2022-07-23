<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('asteroids_neo_ws', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('reference');
            $table->string('name');
            $table->string('speed');
            $table->boolean('is_hazardous');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('asteroids_neo_ws');
    }
};
