<?php

namespace Database\Seeders;

use App\Models\ProductOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductOrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // Récupère le premier utilisateur

        // Créer un ProductOrder
        $productOrder = ProductOrder::create([
            'name' => 'iPhone 15',
            'price' => 999.99,
        ]);

        // Créer un Order lié au ProductOrder (relation polymorphique)
        Order::create([
            'amount' => 999.99,
            'status' => 'paid',
            'user_id' => $user->id,
            'orderable_id' => $productOrder->id,           // ← ID du produit
            'orderable_type' => ProductOrder::class,        // ← Type (polymorphique)
        ]);

        // Exemple avec un autre produit
        $productOrder2 = ProductOrder::create([
            'name' => 'MacBook Pro',
            'price' => 2499.99,
        ]);

        Order::create([
            'amount' => 2499.99,
            'status' => 'pending',
            'user_id' => $user->id,
            'orderable_id' => $productOrder2->id,
            'orderable_type' => ProductOrder::class,
        ]);
    }
}