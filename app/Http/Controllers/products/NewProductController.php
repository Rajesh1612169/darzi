<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;
use App\Models\NewProduct;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewProductController extends Controller
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
        $data = DB::table('new_products as p')
            ->leftJoin('product_category as pc', 'pc.id', '=', 'p.category_id')
            ->leftJoin('brands as pb', 'pb.id', '=', 'p.brand_id')
            ->select('p.*','pc.id as cat_id', 'pc.category_name','pb.id as cat_id', 'pb.brand_name')
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
        $brand = Brands::all();
        return view('products.newcreate', ['pageName'=>$this->pageName, 'data'=>$data, 'brand' => $brand]);
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
            'brand_id' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_qty' => 'required',
            'product_sku' => 'required',
            'product_price' => 'required'
        ]);

        // Create a new product instance
        dd($data);
        $product = new NewProduct();
        $product->category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->product_name = $data['product_name'];
        $product->short_description = $data['short_description'];
        $product->long_description = $data['long_description'];
        $product->sku = $data['product_sku'];
        $product->qty_in_stock = $data['product_qty'];
        $product->price = $data['product_price'];
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
