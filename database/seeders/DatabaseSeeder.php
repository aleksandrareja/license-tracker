<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

         // Konto admina
        User::create([
            'name' => 'Admin',
            'email' => 'admin@company.com',
            'password' => bcrypt('Admin123'),
            'role' => 'admin',
        ]);

        // Konto zwykłego użytkownika
        User::create([
            'name' => 'Test User',
            'email' => 'user@company.com',
            'password' => bcrypt('User123'),
            'role' => 'user',
        ]);


        $this->call([
            ProductSeeder::class,
            LicenseSeeder::class,
            LicenseUserSeeder::class,
        ]);
    }
}
