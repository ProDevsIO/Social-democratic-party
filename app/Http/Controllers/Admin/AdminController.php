<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function view_forms()
    {

        return view('admin.view_forms');
    }

    public function view_categories()
    {

        return view('admin.view_categories');
    }

    public function view_positons()
    {
        
        return view('admin.view_positions');
    }
}
