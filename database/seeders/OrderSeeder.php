<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        
        if ($user) {
            Order::create([
                'user_id' => $user->id,
                'amount' => 50.00,
                'status' => 'paid'
            ]);
        }
    }
}
