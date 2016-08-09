<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Category::with('subcategories')->get());
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
        $cat = Category::create(['name'=>[
                'en' => $request->input('name-en') ?: '',
                'jp' => $request->input('name-jp') ?: '',
                'cn' => $request->input('name-cn') ?: '',
            ]
        ]);

        return response()->json($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Category::with('subcategories')->find($id));
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
        $cat = Category::find($id);

        $cat->name = [
            'en' => $request->input('name-en') ?: '',
            'jp' => $request->input('name-jp') ?: '',
            'cn' => $request->input('name-cn') ?: '',
        ];

        $cat->save();

        return response()->json($cat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);

        if(!$cat){
            return response()->json(['message' => 'Category not found.'], 404);
        }

        if($cat->delete()){
            return response()->json(['message' => 'Delete successful.']);
        }

        return response()->json(['message' => 'Delete unsuccessful.'], 400);
    }
}
