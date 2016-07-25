<?php

use Illuminate\Database\Seeder;

use App\Setting;

use App\SettingImage;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$setting = new Setting([
        	'logo' => 'awesome-logo.png',
        	'name' => 'Awesome',
        	'greeting' => 'Hello, welcome to Awesome!',
        	'wait_mode' => true,
        	'wait_interval' => 60
    	]);

    	$setting->save();

    	$setting->images()->saveMany([
    		new SettingImage(['filename' => 'awesome-slideshow-1.png']),
    		new SettingImage(['filename' => 'awesome-slideshow-2.png']),
    		new SettingImage(['filename' => 'awesome-slideshow-3.png'])
    	]);
    }
}
