<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories_tb';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function subcategories(){
    	return $this->hasMany('App\Subcategory');
    }
}
