<?php

namespace Database\Seeders;

use App\Models\content;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a single user with a hashed password
        User::factory()->create([
            'name' => 'rongci',
            'password' => Hash::make('1234'), // Replace 'your_password_here' with the actual password
        ]);
        
        $this->call(contentSeeder::class);

        
    }
}
