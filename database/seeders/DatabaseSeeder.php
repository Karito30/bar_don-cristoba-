<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Venta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Roles y permisos
        $this->call(RoleSeeder::class);
       //Usuaarios base
     
       $this->call(UserSeeder::class);
      
       


    
   
       
    }
}
