<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = $request->validate([
            "body_type"=> 'required',
            "height"=> 'required',
            "shirt_size"=> 'required',
            "shoulder_type"=> 'required',
            "prefered_fir"=> 'required'
        ]);

        //
        $user_id = \Illuminate\Support\Facades\Auth::user()->id;

        $size_exists = DB::table('user_sizes')->where('user_id', '=', $user_id)->first();
//         dd($size_exists);
         if ($size_exists !== null) {
             $saved_size = UserSize::find($size_exists->id);
//             dd($product);
             $saved_size->user_id = $user_id;
             $saved_size->body_type = $data['body_type'];
             $saved_size->height = $data['height'];
             $saved_size->size = $data['shirt_size'];
             $saved_size->type = $data['shoulder_type'];
             $saved_size->fit = $data['prefered_fir'];
             $saved_size->status = 'yes';
             $saved_size->save();
         }else {
             $size = new UserSize();

             $size->user_id = $user_id;
             $size->body_type = $data['body_type'];
             $size->height = $data['height'];
             $size->size = $data['shirt_size'];
             $size->type = $data['shoulder_type'];
             $size->fit = $data['prefered_fir'];
             $size->status = 'yes';
             $size->save();
         }

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
