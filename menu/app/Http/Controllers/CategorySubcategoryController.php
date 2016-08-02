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
        if(!Category::find($categoryId)){
            return response()->json(['message' => 'Category not found.'], 404);
        }

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
        if(!Category::find($categoryId)){
            return response()->json(['message' => 'Category not found.'], 404);
        }

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
        if(!Category::find($categoryId)){
            return response()->json(['message' => 'Category not found.'], 404);
        }

        $subcat = Subcategory::find($subcategoryId);

        if(!$subcat){
            return response()->json(['message' => 'Subcategory not found.'], 404);
        }

        if($subcat->category_id != $categoryId){
            return response()->json(['message' => 'Subcategory does not belong to category.'], 404);
        }

        return response()->json($subcat);
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

        if(!Category::find($categoryId)){
            return response()->json(['message' => 'Category not found.'], 404);
        }

        if(!$subcat){
            return response()->json(['message' => 'Subcategory not found.'], 400);
        }

        if($subcat->category_id != $categoryId){
            return response()->json(['message' => 'Subcategory does not belong to category.'], 400);
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
    public function destroy($categoryId, $subcategoryId)
    {
        $subcat = Subcategory::find($subcategoryId);

        if(!Category::find($categoryId)){
            return response()->json(['message' => 'Category not found.'], 404);
        }

        if(!$subcat){
            return response()->json(['message' => 'Subcategory not found.'], 400);
        }

        if($subcat->category_id != $categoryId){
            return response()->json(['message' => 'Subcategory does not belong to category.'], 400);
        }

        if($subcat->delete()){
            return response()->json(['message' => 'Delete successful.']);
        }

        return response()->json(['message' => 'Delete unsuccessful.'], 400);
    }
}
