<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\License;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LicenseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $licenses = License::all();
        $users = User::all();

        foreach ($licenses as $license) {
            if($users->isEmpty()) {
                continue;
            }

            // max liczba użytkowników do przypisania
            $max = min($license->max_users, $users->count());

            //INSERT INTO license_user (license_id, user_id) VALUES (...) ON DUPLICATE KEY IGNORE
            $assignedUsers = $users->random(rand(1, $max))->pluck('id'); // zwraca kolekcję ID losowych użytkowników
            $license->users()->sync($assignedUsers);
        }
    }
}
