<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\ProductImage;
use App\ProductVideo;

class ProductsSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$cat = App\Category::where('name', 'Food')->first();
		$dessert = App\Subcategory::where('name', 'Dessert')->first();
		$breakfast = App\Subcategory::where('name', 'Breakfast')->first();

		$product = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $dessert->id,
			'name' => 'Ice cream',
			'description' => 'Vanilla',
			'pepper_description' => 'Buy our Vanilla flavored ice cream its the best yey'
		]);

		$product->save();

		$product->images()->saveMany([
			new ProductImage(['filename' => 'icecream1.jpg']),
			new ProductImage(['filename' => 'icecream2.jpg']),
			new ProductImage(['filename' => 'icecream3.jpg'])
		]);

		$product2 = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $breakfast->id,
			'name' => 'Bacon and egg',
			'description' => 'Bacon and egg meal',
			'pepper_description' => 'With free unlimited coffee yey'
		]);

		$product2->save();

		$product2->images()->saveMany([
			new ProductImage(['filename' => 'baconandeggs1.jpg']),
			new ProductImage(['filename' => 'baconandeggs2.jpg']),
		]);

		$product2->videos()->save(new ProductVideo(['filename' => 'baconeggvideo.mp4']));
	}
}
