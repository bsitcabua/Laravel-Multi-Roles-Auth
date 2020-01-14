<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreLoginRequest;

class UserSessionController extends BaseController
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('shared.pages.login');
    }

    public function store(StoreLoginRequest $request)
    {
        // Validation
        if($response = $this->validateRequest($request)){
            $response = $response['validator']->messages();
            return back()->withInput()->with('error', $response);
        }

        try{
            
            $payload = request(['email', 'password']);

            if(! Auth::attempt($payload)){
                return back()->withErrors([ 'error_msg' => 'Invalid credentials'])->withInput();
            }

            if(auth()->user()->role()->name == 'user')
                return redirect('/');
            else
                return redirect('/admin');

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function logout()
    {
        // Destroy Auth
        auth()->logout();

        // Redirect
        return redirect('/login')->with('msg', 'You have been logged out!');
    }
}
