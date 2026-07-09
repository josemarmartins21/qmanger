<?php

namespace Database\Seeders;

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
           // PermissionSeeder::class,
           MunicipioSeeder::class,
           BairroSeeder::class,
           // EnderecoSeeder::class,
           // PlanSeeder::class,
           // AccountSeeder::class,
           // ContactSeeder::class,
           // SignatureSeeder::class,
           UserSeeder::class,
        ]);

        
    }
}
