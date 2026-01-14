<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'IDE Pro',
            'description' => 'Profesjonalne środowisko programistyczne dla developerów i zespołów IT.',
            'version' => '2024.1.0',
            'price' => 499,
        ]);

        Product::create([
            'name' => 'CRM Business',
            'description' => 'Kompleksowy system CRM do zarządzania relacjami z klientami.',
            'version' => '2.5',
            'price' => 999,
        ]);

        Product::create([
            'name' => 'VPN Secure Access',
            'description' => 'Bezpieczny dostęp do sieci firmowej z dowolnego miejsca.',
            'version' => '4.2',
            'price' => 149,
        ]);
    }
}
