<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Enums\UserType;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buyer = User::whereType(UserType::BUYER)->first();

        $products= Product::pluck('id')->toArray();

        $buyer->products()->attach($products);
    }
}
