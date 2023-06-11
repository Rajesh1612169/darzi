<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
// use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];

            return response()->json($response, 400);
        }
            $input = $request->all();

            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);

            $success['token'] = $user->createToken('authToken')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Create Successfully'
            ];

            return response()->json($response, 200);
    }

    public function login(Request $request) {
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();
    
            $success['token'] = $user->createToken('authToken')->plainTextToken;
            $success['name'] = $user->name;
    
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Login Successfully'
            ];
            return response()->json($response, 200);
        }
        else {
            $response = [
                'success' => false,
                'message' => 'Unauthorized'
            ];

            return response()->json($response);
        }
    }
}
