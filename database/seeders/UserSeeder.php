<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'hanum@gymmember.com')->first();

        if ($user) {
            $user->update([
                'name' => 'Admin Gym',
                'password' => 'hanum098',
            ]);
        } else {
            User::create([
                'name' => 'Admin Gym',
                'email' => 'hanum@gymmember.com',
                'password' => 'hanum098',
            ]);
        }
    }
}
