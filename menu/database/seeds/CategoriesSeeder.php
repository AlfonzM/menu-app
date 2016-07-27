<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Category::create(['name'=>['en'=>'Food', 'jp' => 'フード', 'cn' => '餐饮']]);
    	Category::create(['name'=>['en'=>'Books', 'jp' => '図書', 'cn' => '图书']]);
    }
}
