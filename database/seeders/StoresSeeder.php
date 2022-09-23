<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Enums\UserType;
use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchantId=User::whereType(UserType::MERCHANT)->first()->id;

        //Store where calculate VAT from products
        $store1= Store::create([
            'user_id'        => $merchantId,
            'name'           => 'Glaces Store' ,
            'shipping_cost'  => 30,
            'vat_percentage' => 20,
        ]);

        //Store where Vat included in products
        $store2= Store::create([
            'user_id'        => $merchantId,
            'name'           => 'Food Store' ,
            'shipping_cost'  => 50,
            'vat_percentage' => null,
        ]);

        $productsforStore1=[
            [
                'name' =>'glass1',
                'description' => 'glass1 test1',
                'price' => 10000
            ],[
                'name' =>'glass2',
                'description' => 'glass2 test2',
                'price' => 20000
            ]
        ];
        $store1->products()->createMany($productsforStore1);



        $productsforStore2=[
            [
                'name' =>'food1',
                'description' => 'food1 , test1',
                'price' => 5000
            ],[
                'name' =>'food2',
                'description' => 'food2 , test2',
                'price' => 1000
            ]
        ];
        $store2->products()->createMany($productsforStore2);
    }
}
