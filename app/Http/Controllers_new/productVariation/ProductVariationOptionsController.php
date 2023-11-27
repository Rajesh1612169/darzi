<?php

namespace App\Http\Controllers\productVariation;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\Models\ProductVariationOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductVariationOptionsController extends Controller
{
    public $pageName = 'Product Variation Options Management';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('product_variation_options as pvo')
            ->leftjoin('product_variation as pv', 'pv.id', '=', 'pvo.variation_id')
            ->paginate(5);
//        dd($data);
        return view('productVariationOptions.index', ['data' => $data, 'pageName'=>$this->pageName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProductVariation::all();
        return view('productVariationOptions.create', ['pageName'=>$this->pageName, 'data'=>$data]);
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
            'variation_option_name' => 'required',
            'variation_id' => 'required',
        ]);

        ProductVariationOptions::create($request->all());

        return redirect()->route('variation.option.index')
            ->with('message','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariationOptions  $productVariationOptions
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariationOptions $productVariationOptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVariationOptions  $productVariationOptions
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariationOptions $productVariationOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariationOptions  $productVariationOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariationOptions $productVariationOptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariationOptions  $productVariationOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariationOptions $productVariationOptions)
    {
        //
    }
}
