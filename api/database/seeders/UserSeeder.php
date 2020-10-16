<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'name' => "Kenneth Fernandez",
            'email' => "kenneth@gmail.com",
            'password' => bcrypt('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => "Rodzainna Hamisain",
            'email' => "rodzainna@gmail.com",
            'password' => bcrypt('password')
        ]);
    }
}
