<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products_tb';

    protected $fillable = ['category_id', 'subcategory_id', 'name', 'description', 'pepper_description', 'featured', 'ranking'];

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
}
