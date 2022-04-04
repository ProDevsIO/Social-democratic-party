<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
        if (auth()->check())
        {
            return redirect()->to('/admin/dashboard');
        }
      
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => "required",
            'password' => "required"
        ]);

        $request_data = $request->all();
        unset($request_data['_token']);
        if (auth()->attempt($request_data)) {
           
            if(auth()->user()->type != 1){
                auth()->logout();
                session()->flash('alert-danger', 'Login Incorrect, Kindly check your username/password.');
                return back();
            }

            return redirect()->to('/admin/dashboard');
        }

        session()->flash('alert-danger', 'Login Incorrect, Kindly check your username/password.');
        return back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/login');
    }
}
