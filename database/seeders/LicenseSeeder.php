<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = \App\Models\Product::all();
        $users = \App\Models\User::all();

        if($products->isEmpty() || $users->isEmpty()) {
            $this->command->info('No products or users found, skipping license seeding.');
            return;
        }

        for($i=0;$i<10;$i++) {
            //$user = $users->random();
            $product = $products->random();

            $expirationDate = now()->addDays(rand(-10, 60));

            \App\Models\License::create([
                'product_id' => $product->id,
                'key' => 'LIC-' . strtoupper(bin2hex(random_bytes(5))),
                'max_users' => rand(1, 10),
                'expiration_date' => $expirationDate,
                'status' => $expirationDate < now() ? 'expired' : 'active',
                'price' => rand(100, 1000),
            ]);
        }
    }
}
