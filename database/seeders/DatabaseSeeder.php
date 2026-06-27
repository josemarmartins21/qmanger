<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Signature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //UserSeeder::class,
           PermissionSeeder::class,
           MunicipioSeeder::class,
           EnderecoSeeder::class,
           PlanSeeder::class,
           AccountSeeder::class,
           SignatureSeeder::class
        ]);

        
    }
}
