<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('home.index');
    }

    public function login()
    {
        return view('auth.login');
    }
}
