<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Subcategory;
use Illuminate\Http\Request;

class CategorySubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryId)
    {
        return response()->json(Category::find($categoryId)->subcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categoryId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $categoryId)
    {
        $subcat = Subcategory::create([
            'name' => [
                'en' => $request->input('name-en') ?: '',
                'jp' => $request->input('name-jp') ?: '',
                'cn' => $request->input('name-cn') ?: '',
            ],
            'category_id' => $categoryId
        ]);

        return response()->json($subcat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId, $subcategoryId)
    {
        $sub = Subcategory::find($subcategoryId);

        if(!$subcat){
            return response()->json(['error' => 'Subcategory not found.'], 400);
        }

        if($subcat->category_id != $categoryId){
            return response()->json(['error' => 'Subcategory does not belong to category.'], 400);
        }

        return response()->json($sub);
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
    public function update(Request $request, $categoryId, $subcategoryId)
    {
        $subcat = Subcategory::find($subcategoryId);

        if(!$subcat){
            return response()->json(['error' => 'Subcategory not found.'], 400);
        }

        if($subcat->category_id != $categoryId){
            return response()->json(['error' => 'Subcategory does not belong to category.'], 400);
        }

        $subcat->name = [
            'en' => $request->input('name-en') ?: '',
            'jp' => $request->input('name-jp') ?: '',
            'cn' => $request->input('name-cn') ?: '',
        ];
        
        $subcat->save();

        return response()->json($subcat);
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
