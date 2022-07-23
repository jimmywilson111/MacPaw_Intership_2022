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
        Schema::create('near_earth_objects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('referenced');
            $table->string('name');
            $table->string('speed');
            $table->boolean('is_hazardous')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('near_earth_objects');
    }
};
