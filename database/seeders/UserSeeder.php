<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory(1)->create([
            'name' => 'Josimar Martins',
            'email' => 'josemarburguel@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('teresa@2020'),
            'remember_token' => Str::random(10),
            'is_master' => true,
        ])->first();

        $user->assignPermission('super-admin');

        $user = User::factory(1)->create([
            'name' => 'Deodato Francisco',
            'email' => 'deodato.dalton@qostel.co.ao',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_master' => true,
        ])->first();

        $user->assignPermission('super-admin');
    }
}
