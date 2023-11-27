<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\ProductItems;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductItemsController extends Controller
{
    public $pageName = 'Product Items Management';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->search) ? dd($request->search) : '';
        $data = DB::table('product_items as pi')
            ->leftJoin('products as p', 'p.id', '=', 'pi.product_id')
            ->select('pi.*','p.id as prod_id', 'p.product_name')
            ->paginate(5);
//        dd($data);
        return view('productItems.index', ['pageName'=>$this->pageName, 'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Products::all();
//        dd($data);
        return view('productItems.create', ['pageName'=>$this->pageName, 'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $data = $request->validate([
            'product_id' => 'required',
            'sku' => 'required',
            'qty_in_stock' => 'required',
            'product_image' => 'required|image',
            'price' => 'required',
        ]);


        $image = $request->file('product_image');
        // Generate a unique filename for the image
        $imageName = time() . '_' . $image->getClientOriginalName();
        // Move the uploaded image to the public directory
        $image->move(public_path().'/product_images', $imageName);
        // Create a new product instance
        $product = new ProductItems();
        $product->product_id = $data['product_id'];
        $product->sku = $data['sku'];
        $product->qty_in_stock = $data['qty_in_stock'];
        $product->product_image = '/product_images/'.$imageName;
        $product->price = $data['price'];
        $product->save();
        // Redirect or perform any other actions
        return redirect()->route('product.items.index')->with('success', 'Product saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductItems  $productItems
     * @return \Illuminate\Http\Response
     */
    public function show(ProductItems $productItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductItems  $productItems
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductItems $productItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductItems  $productItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductItems $productItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductItems  $productItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductItems $productItems)
    {
        //
    }
}
