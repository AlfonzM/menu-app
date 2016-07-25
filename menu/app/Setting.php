<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings_tb';

    protected $fillable = ['logo', 'name', 'greeting', 'wait_mode', 'wait_interval'];

    protected $hidden = ['created_at', 'updated_at'];

    public function images(){
    	return $this->hasMany('App\SettingImage');
    }
}
