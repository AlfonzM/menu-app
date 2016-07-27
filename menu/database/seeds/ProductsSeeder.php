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
		$cat = App\Category::where('name', 'like', '%Food%')->first();
		$dessert = App\Subcategory::where('name', 'like', '%Dessert%')->first();
		$breakfast = App\Subcategory::where('name', 'like', '%Breakfast%')->first();



		// PRODUCT 1

		$product = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $dessert->id,
			'name' => [
				'en' => 'Ice cream',
				'jp' => 'アイスクリーム',
				'ch' => '冰淇淋'
			],
			'description' => [
				'en' => 'Vanilla',
				'jp' => 'バニラ',
				'cn' => '香草',
			],
			'pepper_description' => [
				'en' => 'Buy our Vanilla flavored ice cream its the best yey',
				'jp' => '私たちのバニラ味のアイスクリームにその最高のを買います',
				'cn' => '购买我们的香草味冰淇淋的最佳'
			]
		]);

		$product->save();

		$product->images()->saveMany([
			new ProductImage(['filename' => 'icecream1.jpg']),
			new ProductImage(['filename' => 'icecream2.jpg']),
			new ProductImage(['filename' => 'icecream3.jpg'])
		]);




		// PRODUCT 2

		$product2 = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $breakfast->id,
			'name' => [
				'en' => 'Bacon and egg',
				'jp' => 'ベーコンと卵',
				'cn' => '培根和鸡蛋',
			],
			'description' => [
				'en' => 'Bacon and egg meal',
				'jp' => 'ベーコンと卵の食事',
				'cn' => '培根和鸡蛋饭'
			],
			'pepper_description' => [
				'en' => 'With free unlimited coffee yey',
				'jp' => '無制限の無料のコーヒーYEYと',
				'cn' => '随着自由无限的咖啡',
			]
		]);

		$product2->save();

		$product2->images()->saveMany([
			new ProductImage(['filename' => 'baconandeggs1.jpg']),
			new ProductImage(['filename' => 'baconandeggs2.jpg']),
		]);

		$product2->videos()->save(new ProductVideo(['filename' => 'baconeggvideo.mp4']));




		// PRODUCT 3

		$product3 = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $breakfast->id,
			'name' => [
				'en' => 'French toast',
				'jp' => 'フレンチトースト',
				'cn' => '法式吐司',
			],
			'description' => [
				'en' => 'French toast so tasty!',
				'jp' => 'フレンチトーストとてもおいしいです！',
				'cn' => '法式烤麵包很好吃！'
			],
			'pepper_description' => [
				'en' => 'With free unlimited coffee yey',
				'jp' => '無制限の無料のコーヒーとまだ',
				'cn' => '隨著免費無限制尚未咖啡',
			]
		]);

		$product3->save();




		// PRODUCT 4

		$product4 = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $breakfast->id,
			'name' => [
				'en' => 'Honey Glazed Donuts',
				'jp' => 'ハニー釉ドーナツ',
				'cn' => '蜜汁甜甜圈',
			],
			'description' => [
				'en' => 'With free coffee',
				'jp' => '無料のコーヒー付き',
				'cn' => '免費咖啡'
			],
			'pepper_description' => [
				'en' => 'Donuts and coffee are the best!',
				'jp' => 'ドーナツとコーヒーは最高です！',
				'cn' => '甜甜圈和咖啡是最好的!',
			]
		]);

		$product4->save();



		// PRODUCT 5

		$product5 = new Product([
			'category_id' => $cat->id,
			'subcategory_id' => $dessert->id,
			'name' => [
				'en' => 'Brownie a-la Mode',
				'jp' => '・ラ・モードをブラウニー',
				'cn' => '布朗尼一拉模式',
			],
			'description' => [
				'en' => 'Homemade fudgy brownies with caramel sauce and vanilla ice cream',
				'jp' => 'キャラメルソースとバニラアイスクリームと自家製ファッジブラウニー',
				'cn' => '自制软糖巧克力蛋糕与焦糖酱和香草冰淇淋'
			],
			'pepper_description' => [
				'en' => 'Homemade fudgy brownies with caramel sauce and vanilla ice cream',
				'jp' => 'キャラメルソースとバニラアイスクリームと自家製ファッジブラウニー',
				'cn' => '自制软糖巧克力蛋糕与焦糖酱和香草冰淇淋'
			],
		]);

		$product5->save();
	}
}
