<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('Admin.auth.login');
    }
    public function do_login(Request $request)
    {
        $data=$request->validate([
        'email'=>'required|email|max:191',
        'password'=>'required|string'
        ]);
       if(!auth()->guard('Admin')->attempt(['email'=>$data['email'],'password'=>$data['password']]))
       {
           return back();
       }
       else
       {
           return redirect(route('Admin.home'));
       }
    }
    public function logout(){
        auth()->guard('Admin')->logout();
        return redirect(route('Admin.login'));
    }
}
