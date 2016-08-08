<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingImage extends Model
{
    protected $table = 'setting_images_tb';

    protected $fillable = ['setting_id', 'filename'];

    protected $hidden = ['created_at', 'updated_at'];

    public function setting(){
    	return $this->belongsTo('App\Setting');
    }
    
    public function getFilenameAttribute($value){
    	if(!filter_var($value, FILTER_VALIDATE_URL)){
	    	return url('/files') . '/' . $value;
    	} else {
    		return $value;
    	}
    }
}