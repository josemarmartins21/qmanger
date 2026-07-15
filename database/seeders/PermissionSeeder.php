<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Permission::factory(1)->create([
        'name' => 'admin'
       ]);
       Permission::factory(1)->create([
        'name' => 'default'
       ]);
       Permission::factory(1)->create([
        'name' => 'super-admin'
       ]);
    }
}
