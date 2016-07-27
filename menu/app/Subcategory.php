<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Themsaid\Multilingual\Translatable;

class Subcategory extends Model
{
    protected $table = 'subcategories_tb';

    // Translatable
    use Translatable;
    public $translatable = ['name'];
    public $casts = ['name' => 'array'];
    
    protected $fillable = ['category_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
