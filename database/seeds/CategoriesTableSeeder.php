<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           [
               'name' => 'Мобильные телефоны',
               'code' => 'mobiles',
               'description' => 'Oписание Mобильных телефонов',
               'image' => 'categories/mobile_phones.jpg',
           ],
           [
               'name' => 'Портативная техника',
               'code' => 'portable',
               'description' => 'Описание Портативная техника',
               'image' => 'categories/portable_technik.png',
           ],
           [
               'name' => 'Бытовая техника',
               'code' => 'appliance',
               'description' => 'Описание Бытовая техника',
               'image' => 'categories/home_technik.jpg',
           ],
        ]);
    }
}
