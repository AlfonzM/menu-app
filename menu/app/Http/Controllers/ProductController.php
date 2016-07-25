<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\ProductImage;
use App\ProductVideo;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::with(['category','subcategory','images','videos']);

        if($request->has('cat')){
            $query->where('category_id', $request->input('cat'));
        }

        if($request->has('subcat')){
            $query->where('subcategory_id', $request->input('subcat'));
        }

        if($request->has('name')){
            $query->where('name', 'like', "%{$request->input('name')}%");
        }

        if($request->has('featured')){
            $query->where('featured', 1);
        }

        if($request->has('sort') && in_array($request->input('sort'), ['name','created_at','ranking'])) {
            $sortType = ($request->has('sort_type')) ? $request->input('sort_type') : 'asc';

            $query->orderBy($request->input('sort'),$sortType);
        }

        return response()->json($query->get());
    }

    public function images($id)
    {
        return response()->json(Product::find($id)->images);
    }

    public function videos($id)
    {
        return response()->json(Product::find($id)->videos);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Product::with(['category','subcategory','images','videos'])->find($id));
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
        //
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
