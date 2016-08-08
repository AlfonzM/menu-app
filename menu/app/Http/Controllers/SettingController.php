<?php

namespace App\Http\Controllers;

use App\Setting;
use App\SettingImage;
use App\Helpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Setting::with('images')->get());
    }

    public function images($id)
    {
        return response()->json(Setting::find($id)->images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $logo = '';

        // Save logo image
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $logo = Helpers::save_image($file);
        }

        $setting = Setting::create([
            'name' => $request->input('name'),
            'logo' => $logo,
            'greeting' => [
                'en' => $request->input('greeting-en'),
                'jp' => $request->input('greeting-jp'),
                'cn' => $request->input('greeting-cn'),
            ],
            'default_language' => $request->input('default-language'),
            'languages' => implode(",", array_filter([$request->input('language-en'), $request->input('language-jp'),$request->input('language-cn')])),
            'wait_mode' => $request->input('wait-mode'),
            'wait_interval' => $request->input('wait-interval'),
        ]);

        // Save slideshow images
        if($request->hasFile('images')){
            $setting->saveImages($request->file('images'));
        }

        return response()->json($setting);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Setting::with('images')->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::with('images')->find($id);

        $setting->name = $request->input('name');
        $setting->greeting = [
            'en' => $request->input('greeting-en'),
            'jp' => $request->input('greeting-jp'),
            'cn' => $request->input('greeting-cn'),
        ];
        $setting->default_language = $request->input('default-language');
        $setting->wait_mode = $request->input('wait-mode');
        $setting->wait_interval = $request->input('wait-interval');
        // $setting->languages = $request->input('languages'); // e.g. "en,jp"
        $setting->languages = implode(",", array_filter([$request->input('language-en'), $request->input('language-jp'),$request->input('language-cn')])); // e.g. "en,jp"

        // Save logo image
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $setting->logo = Helpers::save_image($file);
        }

        $setting->save();

        // Save slideshow images
        if($request->hasFile('images')){
            $setting->saveImages($request->file('images'));
        }

        return response()->json($setting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
