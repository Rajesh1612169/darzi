<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public $pageName = 'Role Management';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        isset($request->search) ? dd($request->search) : '';
        $data = Roles::paginate(5);
        return view('roles.index', ['data' => $data, 'pageName'=>$this->pageName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create', ['pageName'=>$this->pageName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'role_type' => 'required',
        ]);

        Roles::create($request->all());

        return redirect()->route('roles.index')
                        ->with('message','Role created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // dd($roles);
        //  $data=Roles::find($id);
         $data = Roles::findOrFail($id);

        //  dd($data);
         return view('roles.show', ['data' => $data]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $data = Roles::findOrFail($id);

//          dd($data);
         return view('roles.update', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//         dd($request);
        $request->validate([
            'role_type' => 'required',
        ]);

        $roles = Roles::find($id);
        $roles->role_type = $request->input('role_type');

        $roles->update($request->all());

        return redirect()->route('roles.index')
                        ->with('message','Role created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($roles);
        $roles=Roles::find($id);
        $roles->delete();

        return redirect()->route('roles.index')
                        ->with('message','Role deleted successfully');
    }
}
