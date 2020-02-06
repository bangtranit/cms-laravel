<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'bang@gmail.com')->first();
        if (!$user)
        {
            User::create([
                'email' => 'bang@gmail.com',
                'name' => 'Tran Thanh Bang',
                'password' => \Illuminate\Support\Facades\Hash::make('thanhbang'),
                'role' => User::USER_ADMIN,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}

