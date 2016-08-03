<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Helpers
{
    /**
     * Save given file to public/images/
     *
     * @param  UploadedFile $file
     * @return string $filename - The generated filename
     */

	static function save_image($file){
		return Helpers::save_file($file);
	}

	static function save_video($file){
		return Helpers::save_file($file);
	}

	static function save_file($file){
		$origName = $file->getClientOriginalName();
		$filename = str_slug(pathinfo($origName, PATHINFO_FILENAME)) . '-' . uniqid() . '.' . pathinfo($origName, PATHINFO_EXTENSION);

		$file->move(storage_path() . "/app/files/", $filename);

		return $filename;
	}
}
