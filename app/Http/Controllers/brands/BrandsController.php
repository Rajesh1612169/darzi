<?php

namespace App\Http\Controllers\brands;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{

    public $pageName = 'Brand Management';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        isset($request->search) ? dd($request->search) : '';
        $data = Brands::all();
//        dd($data);
        return view('brands.index', ['data' => $data, 'pageName'=>$this->pageName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('brands.create', ['pageName'=>$this->pageName]);
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
        $data = $request->validate([
            'brand_name' => 'required',
        ]);
        $brand = new Brands();
        $brand->brand_name = $data['brand_name'];
        $brand->save();
        // Redirect or perform any other actions
        return redirect()->route('brands.index')->with('success', 'Brand saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit(Brands $brands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brands $brands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brands $brands)
    {
        //
    }
}
