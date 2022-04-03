<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
      
        return view('auth.login');
    }

    public function login(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'email' => "required",
            'password' => "required"
        ]);

        $request_data = $request->all();
        unset($request_data['_token']);
        if (auth()->attempt($request_data)) {

            return redirect()->to('/admin/dashboard');
        }
        session()->flash('alert-danger', 'Login Incorrect, Kindly check your username/password.');
        return back();
    }
}
