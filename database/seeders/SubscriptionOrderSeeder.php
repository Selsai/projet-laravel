<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\SubscriptionOrder;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubscriptionOrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        
        if ($user) {
            $subscriptionOrder = SubscriptionOrder::create([
                'name' => 'Premium Plan',
                'price' => 29.99,
                'duration_months' => 12
            ]);
            
            $user->orders()->create([
                'amount' => $subscriptionOrder->price,
                'status' => 'paid'
            ])->orderable()->associate($subscriptionOrder);
        }
    }
}
