<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductOrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        
        if ($user) {
            $productOrder = ProductOrder::create([
                'name' => 'iPhone 15',
                'price' => 999.99
            ]);
            
            $user->orders()->create([
                'amount' => $productOrder->price,
                'status' => 'paid'
            ])->orderable()->associate($productOrder);
        }
    }
}
