<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $pageName = 'Product Management';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->search) ? dd($request->search) : '';
        $data = DB::table('products as p')
            ->leftJoin('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->select('p.*','pc.id as cat_id', 'pc.category_name')
            ->paginate(5);
//        dd($data);
        return view('products.index', ['data' => $data, 'pageName'=>$this->pageName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProductCategory::all();
        return view('products.create', ['pageName'=>$this->pageName, 'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'product_image' => 'required|image',
        ]);


        $image = $request->file('product_image');

        // Generate a unique filename for the image
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Move the uploaded image to the public directory
        $image->move(public_path().'/product_images', $imageName);

        // Create a new product instance
        $product = new Products();
        $product->category_id = $data['category_id'];
        $product->product_name = $data['product_name'];
        $product->description = $data['description'];
        $product->product_image = '/product_images/'.$imageName;
        $product->save();

        // Redirect or perform any other actions
        return redirect()->route('products.index')->with('success', 'Product saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
