<?php

namespace App;

use App\Helpers;
use App\SettingImage;
use Illuminate\Database\Eloquent\Model;
use Themsaid\Multilingual\Translatable;

class Setting extends Model
{
    protected $table = 'settings_tb';

    // Translatable
    use Translatable;
    public $translatable = ['greeting'];
    public $casts = ['greeting' => 'array'];

    protected $fillable = ['logo', 'name', 'greeting', 'wait_mode', 'wait_interval', 'default_language', 'languages'];

    protected $hidden = ['created_at', 'updated_at'];

    public function images(){
    	return $this->hasMany('App\SettingImage');
    }

    /*
     * @param UploadedFile array
     */
    public function saveImages($images)
    {
        $settingImages = [];

        foreach($images as $image){
            $filename = Helpers::save_image($image);
            $settingImages[] = new SettingImage(['filename' => $filename]);
        }

        $this->images()->saveMany($settingImages);
    }
}
