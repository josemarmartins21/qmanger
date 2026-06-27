<?php

namespace Database\Seeders;

use App\Models\Bairro;
use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipio::factory(10)
        ->has(Bairro::factory(10))
        ->create();
    }
}
