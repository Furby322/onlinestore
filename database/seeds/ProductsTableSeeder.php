<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhone 12 mini 128GB',
                'code' => 'iphone_12_mini_128',
                'description' => 'Po krasote',
                'price' => '69990',
                'category_id' => 1,
                'image' => 'products/iphone_12_mini.jpg',
                'count' => 10,
            ],
            [
                'name' => 'iPhone 12 128GB',
                'code' => 'iphone_12_128',
                'description' => 'Po krasote x2',
                'price' => '79990',
                'category_id' => 1,
                'image' => 'products/iphone_12.jpg',
                'count' => 10,
            ],
            [
                'name' => 'Redmi AirDots',
                'code' => 'redmi_airdots',
                'description' => 'Po krasote x3',
                'price' => '1990',
                'category_id' => 2,
                'image' => 'products/redmi_airdots.jpg',
                'count' => 10,
            ],
            [
                'name' => 'Sony XDR1000',
                'code' => 'sony_xdr1000',
                'description' => 'Po krasote x4',
                'price' => '13990',
                'category_id' => 2,
                'image' => 'products/sony_xdr1000.jpg',
                'count' => 10,
            ],
            [
                'name' => 'DeLongi',
                'code' => 'delongi',
                'description' => 'Po krasote x5',
                'price' => '22990',
                'category_id' => 2,
                'image' => 'products/delongi.jpg',
                'count' => 10,
            ],
            [
                'name' => 'Scarlett',
                'code' => 'scarlett',
                'description' => 'Po krasote x6',
                'price' => '560',
                'category_id' => 3,
                'image' => 'products/scarlett.jpg',
                'count' => 10,
            ],
        ]);
    }
}
