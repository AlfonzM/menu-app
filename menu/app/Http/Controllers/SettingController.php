<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Setting;

use App\SettingImage;

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
        $setting = Setting::create([
            'name' => $request->input('name'),
            'logo' => $request->input('logo'),
            'greeting' => [
                'en' => $request->input('greeting-en'),
                'jp' => $request->input('greeting-jp'),
                'cn' => $request->input('greeting-cn'),
            ],
            'default_language' => $request->input('default-language'),
            'languages' => $request->input('languages'),
            'wait_mode' => $request->input('wait-mode'),
            'wait_interval' => $request->input('wait-interval'),
        ]);

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
        $setting->logo = $request->input('logo');
        $setting->greeting = [
            'en' => $request->input('greeting-en'),
            'jp' => $request->input('greeting-jp'),
            'cn' => $request->input('greeting-cn'),
        ];
        $setting->default_language = $request->input('default-language');
        $setting->languages = $request->input('languages');
        $setting->wait_mode = $request->input('wait-mode');
        $setting->wait_interval = $request->input('wait-interval');

        $setting->save();

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
