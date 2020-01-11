<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {
        //
    }

}
