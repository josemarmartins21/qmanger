<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Permission::factory(1)->hasUsers(5)->create([
        'name' => 'admin'
       ]);
       Permission::factory(1)->hasUsers(5)->create([
        'name' => 'default'
       ]);
       Permission::factory(1)->hasUsers(3)->create([
        'name' => 'super-admin'
       ]);
    }
}
