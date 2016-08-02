<?php

namespace App;

use App\Helpers;
use Illuminate\Database\Eloquent\Model;
use Themsaid\Multilingual\Translatable;

class Product extends Model
{
    protected $table = 'products_tb';

    // Translatable
    use Translatable;
    public $translatable = ['name', 'description', 'pepper_description'];
    public $casts = ['name' => 'array', 'description' => 'array', 'pepper_description' => 'array'];

    protected $fillable = ['category_id', 'subcategory_id', 'name', 'description', 'pepper_description', 'featured', 'ranking', 'discount'];

    protected $hidden = ['created_at', 'updated_at'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function subcategory(){
    	return $this->belongsTo('App\Subcategory');
    }

    public function images(){
    	return $this->hasMany('App\ProductImage');
    }

    public function videos(){
    	return $this->hasMany('App\ProductVideo');
    }

    /*
     * @param UploadedFile array
     */
    public function saveImages($images)
    {
        $productImages = [];

        foreach($images as $image){
            $filename = Helpers::save_image($image);
            $productImages[] = new ProductImage(['filename' => $filename]);
        }

        $this->images()->saveMany($productImages);
    }

    /*
     * @param UploadedFile array
     */
    public function saveVideos($videos)
    {
        $productVideos = [];

        foreach($videos as $video){
            $filename = Helpers::save_video($video);
            $productVideos[] = new ProductVideo(['filename' => $filename]);
        }

        $this->videos()->saveMany($productVideos);
    }
}
