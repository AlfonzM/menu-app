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
    	$foodCategory = Category::where('id', 1)->first();
    	$foodCategory->subcategories()->saveMany([
    		new Subcategory(['name' => 'Breakfast']),
    		new Subcategory(['name' => 'Lunch']),
    		new Subcategory(['name' => 'Dessert'])
		]);

    	$books = Category::where('id', 2)->first();
    	$books->subcategories()->saveMany([
    		new Subcategory(['name' => 'Fiction']),
    		new Subcategory(['name' => 'Non-Fiction']),
    		new Subcategory(['name' => 'Sci-fi'])
		]);
    }
}
