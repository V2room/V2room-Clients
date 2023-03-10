<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \V2room\Models\Users\User::factory()->create([
            'name' => 'V2Room',
            'email' => 'cs.v2room@gamil.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
