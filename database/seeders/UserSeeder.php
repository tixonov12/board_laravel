<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['login' => 'ivan', 'password' => '1234'],
            ['login' => 'nikushka', 'password' => '1234'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
