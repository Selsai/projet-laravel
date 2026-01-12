<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        if ($user) {
            $user->settings()->create([
                'theme' => 'dark',
                'lang' => 'fr'
            ]);
        }
    }
}
