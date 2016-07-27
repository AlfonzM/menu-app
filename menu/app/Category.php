<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Themsaid\Multilingual\Translatable;

class Category extends Model
{
    protected $table = 'categories_tb';
    
	// Translatable
	use Translatable;
	public $translatable = ['name'];
	public $casts = ['name' => 'array'];

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function subcategories(){
    	return $this->hasMany('App\Subcategory');
    }
}
