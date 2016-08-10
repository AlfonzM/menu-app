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
        $settingId = App\Setting::first()->id;
    	Category::create(['setting_id' => $settingId, 'name'=>['en'=>'Food', 'jp' => 'フード', 'cn' => '餐饮']]);
    	Category::create(['setting_id' => $settingId, 'name'=>['en'=>'Books', 'jp' => '図書', 'cn' => '图书']]);
    }
}
