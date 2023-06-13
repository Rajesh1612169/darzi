<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserSize;
use Illuminate\Http\Request;

class UserSizeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
   
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
        $user_id = \Illuminate\Support\Facades\Auth::user()->id;
        // dd($request);
        $data = $request->validate([
            "imgbackground"=> 'required',
            "option"=> 'required',
            "option1"=> 'required',
            "imgbackground1213"=> 'required',
            "imgbackground2"=> 'required'
        ]);
        $size = new UserSize();
        $size->user_id = $user_id;
        $size->body_type = $data['imgbackground'];
        $size->height = $data['option'];
        $size->size = $data['option1'];
        $size->type = $data['imgbackground1213'];
        $size->fit = $data['imgbackground2'];
        $size->status = 'yes';
        $size->save();
        // Redirect or perform any other actions
        return redirect()->back()->with('message','Size Save Successfully');
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
