<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' =>  Hash::make('123123'),
             'is_manager' =>  1,
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Normal User',
             'email' => 'normal@example.com',
             'password' =>  Hash::make('123123'),
             'is_manager' =>  0,
         ]);

    }
}
