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
            'email' => "kennethworks26@gmail.com",
            'password' => bcrypt('password')
        ]);
    }
}
