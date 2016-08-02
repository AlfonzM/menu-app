<?php

namespace App;

class Helpers
{
    /**
     * Save given file to public/images/
     *
     * @param  UploadedFile $file
     * @return string $filename - The generated filename
     */

	static function save_image($file){
		return Helpers::save_file($file, 'images');
	}

	static function save_video($file){
		return Helpers::save_file($file, 'videos');
	}

	static function save_file($file, $directory){
		$origName = $file->getClientOriginalName();
		$filename = str_slug(pathinfo($origName, PATHINFO_FILENAME)) . '-' . uniqid() . '.' . pathinfo($origName, PATHINFO_EXTENSION);

		$file->move(public_path()."/$directory/", $filename);

		return $filename;
	}
}
