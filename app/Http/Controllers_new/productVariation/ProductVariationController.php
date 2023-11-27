<?php

namespace App\Http\Controllers\productVariation;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductVariationController extends Controller
{
    public $pageName = 'Product Variation Management';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->search) ? dd($request->search) : '';
        $data = DB::table('product_variation as pv')
            ->leftjoin('product_category as pc', 'pc.id', '=', 'pv.category_id')
            ->paginate(5);
//        dd($data);
        return view('productVariations.index', ['data' => $data, 'pageName'=>$this->pageName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProductCategory::all();
        return view('productVariations.create', ['pageName'=>$this->pageName, 'data'=>$data]);
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
            'variation_name' => 'required',
            'category_id' => 'required',
        ]);

        ProductVariation::create($request->all());

        return redirect()->route('variation.index')
            ->with('message','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariation $productVariation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariation $productVariation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariation $productVariation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariation $productVariation)
    {
        //
    }
}
