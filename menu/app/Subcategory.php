<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories_tb';
    
    protected $fillable = ['category_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
