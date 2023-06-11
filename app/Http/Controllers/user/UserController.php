<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use Couchbase\Role;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
            ->leftJoin('user_roles', 'user_roles.id', '=', 'users.role_id')
            ->select('user_roles.id as role_id','user_roles.role_type as role','users.*')
            ->paginate(5);
//        dd($data);
        return view('users.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Fetch All Roles
        $roles = Roles::all()->sortByDesc("id");

        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $image = $request->file('profile');

        if ($image) {
            $path = $request->file('profile')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $input['profile'] = $base64;
        }

        $save = User::create($input);
//        dd($save);
        return redirect()->route('users.index')
                        ->with('message','User created successfully.');
    }

    public function updateImg(Request $request) {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


//        $id = (int) $id;
        //   dd(gettype($id));
        //  $data=Roles::find($id);
        // $data = User::all($id);
        $data = User::where('id',$id)->first();


         dd($data);
         return view('users.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        $role = Roles::all();

//          dd($data,$role);
        return view('users.update', ['data' => $data, 'role' => $role]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('message','User updated successfully.');
    }

    public function editPassword($id)
    {
        return view('users.edit-password', ['id' => $id]);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find($id);
//        dd($user);
        $user->password = Hash::make($request->input('password'));
        $user->save();

//        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('message','Password updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // dd($roles);
         $user=User::find($id);
         $user->delete();

         return redirect()->route('users.index')
                         ->with('message','Role deleted successfully');
    }
}
