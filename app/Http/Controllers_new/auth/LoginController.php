<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $auth = Auth::user()->id;
//        dd($auth);
        if (isset(Auth::user()->id) && Auth::user()->id != null) {
            return redirect()->intended('/')->with('message','Successfully Login');
        }
        return view('auth.login');

    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
    //    dd($request);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('home.index')->with('success', 'User Logged In Successfully' );
        }

        return redirect(route('login'))->with('error', 'The provided credentials do not match our records.' );
    }
}
