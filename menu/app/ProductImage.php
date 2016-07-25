<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images_tb';

    protected $fillable = ['product_id', 'filename'];

    protected $hidden = ['created_at', 'updated_at'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
