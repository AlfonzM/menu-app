<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVideo extends Model
{
    protected $table = 'product_videos_tb';

    protected $fillable = ['product_id', 'filename'];

    protected $hidden = ['created_at', 'updated_at'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
