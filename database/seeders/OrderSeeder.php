<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        
        if ($user) {
            $user->orders()->create([
                'amount' => 50.00,
                'status' => 'paid'
            ]);
        }
    }
}
