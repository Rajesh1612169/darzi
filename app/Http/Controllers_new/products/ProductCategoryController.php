<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public $pageName = 'Product Categories Management';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->search) ? dd($request->search) : '';
        $data = DB::table('product_category as pc')
            ->leftJoin('product_category as pcp', 'pc.parent_category_id', '=', 'pcp.id')
            ->select('pc.id as category_id', 'pc.category_name as category_name', 'pcp.id as parent_category_id', 'pcp.category_name as parent_category_name')
            ->paginate(5);
//        dd($data);
        return view('productCategories.index', ['data' => $data, 'pageName'=>$this->pageName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProductCategory::all();
        return view('productCategories.create', ['pageName'=>$this->pageName, 'data'=>$data]);
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

         $request->validate([
            'category_name' => 'required',
            'product_category_image' => 'required',
        ]);
//        dd($data['category_name']);
        $image = $request->file('product_category_image');


        // Generate a unique filename for the image
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Move the uploaded image to the public directory
        $image->move(public_path().'/product_category_images', $imageName);

        // Create a new product instance
        $product_category = new ProductCategory();
        $product_category->category_name = $request->category_name;
        $product_category->parent_category_id = $request->parent_category_id;
        $product_category->product_category_image = '/product_category_images/'.$imageName;
        $product_category->save();

//        ProductCategory::create($request->all());

        return redirect()->route('category.index')
            ->with('message','Role created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
