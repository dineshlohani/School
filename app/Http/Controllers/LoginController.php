<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        
        return view('auth.auth');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function authenticate(Request $request)
    {
        //check user is active or not
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $user = User::where('username', $request->get('email'))->first();
        if(!empty($user) &&  $user->status === 2) {
            return redirect("login")->withSuccess('user has been deactivated');
        }
        $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'username';

        $request->merge([
            $login_type => $request->input('email'),
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended('dashboard');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function username() {
        return 'username';
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
