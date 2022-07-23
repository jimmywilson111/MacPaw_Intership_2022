<?php

namespace Database\Seeders;

use App\Models\NearEarthObject;
use Illuminate\Database\Seeder;

class NearEarthObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        NearEarthObject::factory()->count(50)->create();
    }
}
