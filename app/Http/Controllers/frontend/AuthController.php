<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
//        dd(Auth::user());
        return view('frontend.pages.login');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('home.index'))->with('success', 'User Logged In Successfully' );
        }

        return redirect(route('user.login.index'))->with('error', 'The provided credentials do not match our records.' );
    }
}
