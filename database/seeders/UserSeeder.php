<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'karol',
            'email' => 'karol@gmail.com',
            'password' => bcrypt('hiro3018')
        ])->assignRole('Admin');

        User::factory(0)->create();
        User::create([
            'name' => 'paula',
            'email' => 'paula@gmail.com',
            'password' => bcrypt('paula9898')
        ])->assignRole('Empleado');

        User::factory(0)->create();
        User::create([
            'name' => 'karen',
            'email' => 'karen@gmail.com',
            'password' => bcrypt('karen6987')
        ])->assignRole('Proveedor');

        User::factory(0)->create();
    }
}
