<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            [
                'name'     => 'Merchant Test',
                'email'    => 'MerchantTest@gmail.com',
                'password' => bcrypt('12345678'),
                'type'     => UserType::MERCHANT
            ],
            [
                'name'     => 'User Test',
                'email'    => 'UserTest@gmail.com',
                'password' => bcrypt('12345678'),
                'type'     => UserType::BUYER
            ]
        ];

        User::insert($users);
    }
}
