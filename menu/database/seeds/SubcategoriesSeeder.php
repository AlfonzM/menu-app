<?php

use Illuminate\Database\Seeder;

use App\Category;
use App\Subcategory;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$foodCategory = Category::where('name', 'like', '%Food%')->first();
    	$foodCategory->subcategories()->saveMany([
            new Subcategory(['name' => [
                   'en' => 'Breakfast',
                   'jp' => '朝ごはん',
                   'cn' => '早餐',
                ]
            ]),
            new Subcategory(['name' => [
                   'en' => 'Lunch',
                   'jp' => 'ランチ',
                   'cn' => '午餐',
                ]
            ]),
    		new Subcategory(['name' => [
                   'en' => 'Dessert',
                   'jp' => 'ディナー',
                   'cn' => '晚餐',
                ]
            ]),
		]);

    	$books = Category::where('name', 'like', '%Books%')->first();
    	$books->subcategories()->saveMany([
            new Subcategory(['name' => [
                   'en' => 'Fiction',
                   'jp' => 'フィクション',
                   'cn' => '小说',
                ]
            ]),
            new Subcategory(['name' => [
                   'en' => 'Non-fiction',
                   'jp' => 'ノンフィクション',
                   'cn' => '非小说',
                ]
            ]),
        ]);
    }
}
