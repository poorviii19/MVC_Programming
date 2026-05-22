<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recepie;

class Recepieseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recepie::factory()->count(10)->create();
    }
}