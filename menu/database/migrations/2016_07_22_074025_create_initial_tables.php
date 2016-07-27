<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_tb', function (Blueprint $table){
            $table->increments('id');
            $table->string('logo');
            $table->string('name');
            $table->string('greeting');
            $table->boolean('wait_mode');
            $table->integer('wait_interval');
            $table->timestamps();
        });

        Schema::create('setting_images_tb', function (Blueprint $table){
            $table->increments('id');
            $table->integer('setting_id')->unsigned();
            $table->foreign('setting_id')->references('id')->on('settings_tb');
            $table->string('filename');
            $table->timestamps();
        }); 

        Schema::create('categories_tb', function (Blueprint $table){
            $table->increments('id');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('subcategories_tb', function (Blueprint $table){
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories_tb');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products_tb', function (Blueprint $table){
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories_tb');
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories_tb');
            $table->text('name');
            $table->text('description');
            $table->text('pepper_description');
            $table->boolean('featured');
            $table->integer('ranking');
            $table->timestamps();
        }); 

        Schema::create('product_images_tb', function (Blueprint $table){
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products_tb');
            $table->string('filename');
            $table->timestamps();
        }); 

        Schema::create('product_videos_tb', function (Blueprint $table){
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products_tb');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_videos_tb');
        Schema::drop('product_images_tb');
        Schema::drop('products_tb');
        Schema::drop('subcategories_tb');
        Schema::drop('categories_tb');
        Schema::drop('setting_images_tb');
        Schema::drop('settings_tb');
    }
}
