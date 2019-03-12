<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Admin;
use App\User;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::user()) { dd(Auth::user());
            return redirect()->intended(route('admins.team_list'));
        }
        return view('admins.login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $rule =  $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'is_admin'=>'1'], $request->remember)) {
            //return view('admins.dashboard');
            return redirect('admin/dashboard');
            //return redirect()->intended(route('admins.user_list'));
            //return redirect()->intended('dashboard');
        }else{
            $request->session()->flash('alert-danger', 'Wrong Credentials ');
            return redirect('/admin/login');
            //return view('admins.login');
        }
    }

    public function loginssss(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admins.user_list'));
        }
        $request->session()->flash('alert-danger', 'Wrong Credentials ');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin/login');
    }

   /* protected function guard()
    {
        return Auth::guard('admin');
    }*/

    
}
