<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:member')->only('logout');
    }

    public function memberLoginForm()
    {
        return view('auth.member_login');
        //return redirect()->route('member.dashboard');

    }

    public function memberLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|max:50',
            'password'=>'required|min:6|max:100',
        ]);

        // Attempt to log the user in
        if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password,'status' =>1], $request->remember)) {
            // if successful, then redirect to their intended location
            $request->session()->flash('success','You are logged in successfully !');

            return redirect()->intended(route('member.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        $request->session()->flash('error','Your credentials invalid or account not approved !');

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('member.login.form');
    }
}
