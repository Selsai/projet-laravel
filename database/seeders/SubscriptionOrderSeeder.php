<?php

namespace Database\Seeders;

use App\Models\SubscriptionOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubscriptionOrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        // Créer un SubscriptionOrder
        $subscriptionOrder = SubscriptionOrder::create([
            'name' => 'Premium Plan',
            'price' => 29.99,
            'duration_months' => 12,
        ]);

        // Créer un Order lié au SubscriptionOrder
        Order::create([
            'amount' => 29.99,
            'status' => 'paid',
            'user_id' => $user->id,
            'orderable_id' => $subscriptionOrder->id,
            'orderable_type' => SubscriptionOrder::class,  // ← Important !
        ]);
    }
}