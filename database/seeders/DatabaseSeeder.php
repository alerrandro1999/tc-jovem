<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'borges',
            'email' => 'alerrandrokaton@gmail.com',
            'email_verified_at' => '',
            'password' => Hash::make('123456789'),
            'remember_token' => '',
            'created_at' => '',
            'updated_at' => ''
        ]);
    }
}
