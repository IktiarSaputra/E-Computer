<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => "Admin",
                'email' => "admin@smkn1jakarta.go.id",
                'password' => Hash::make('secret123'),
                'is_admin' => "1",
            ],
            [
                'name' => "User",
                'email' => "user@smkn1jakarta.go.id",
                'password' => Hash::make('secret123'),
                'is_admin' => "0",
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

    }
}
