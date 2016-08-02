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
        $product = Product::create([
            'category_id' => $request->input('category-id'),
            'subcategory_id' => $request->input('subcategory-id'),
            'name' => [
                'en' => $request->input('name-en'),
                'jp' => $request->input('name-jp'),
                'cn' => $request->input('name-cn'),
            ],
            'description' => [
                'en' => $request->input('description-en'),
                'jp' => $request->input('description-jp'),
                'cn' => $request->input('description-cn'),
            ],
            'pepper_description' => [
                'en' => $request->input('pepper-description-en'),
                'jp' => $request->input('pepper-description-jp'),
                'cn' => $request->input('pepper-description-cn'),
            ],
            'featured' => $request->input('featured'),
            'discount' => $request->input('discount'),
            'ranking' => $request->input('ranking')
        ]);

        return response()->json($product);
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
        $product = Product::find($id);

        $product->category_id = $request->input('category-id');
        $product->subcategory_id = $request->input('subcategory-id');
        $product->name = [
            'en' => $request->input('name-en'),
            'jp' => $request->input('name-jp'),
            'cn' => $request->input('name-cn')
        ];
        $product->description = [
            'en' => $request->input('description-en'),
            'jp' => $request->input('description-jp'),
            'cn' => $request->input('description-cn')
        ];
        $product->pepper_description = [
            'en' => $request->input('pepper-description-en'),
            'jp' => $request->input('pepper-description-jp'),
            'cn' => $request->input('pepper-description-cn')
        ];
        $product->featured = ($request->input('featured')) ? 1 : 0;
        $product->discount = $request->input('discount');
        $product->ranking = $request->input('ranking');

        $product->save();

        // Save slideshow images
        if($request->hasFile('images')){
            $product->saveImages($request->file('images'));
        }

        // Save slideshow videos
        if($request->hasFile('videos')){
            $product->saveImages($request->file('videos'));
        }

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            return response()->json(['message' => 'Product not found.'], 404);
        }

        if($product->delete()){
            return response()->json(['message' => 'Delete successful.']);
        }

        return response()->json(['message' => 'Delete unsuccessful.'], 400);
    }
}
