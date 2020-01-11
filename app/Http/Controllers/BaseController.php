<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function validateRequest($request = null)
    {
        try {

            if($request->validator->fails())
                $response = [ 'response' => 201, 'validator' => $request->validator->errors()];
            else
                $response = null;

            return $response;

        } catch(\Throwable $e) {
            throw $e;
        }

    }

    public function isUserRole()
    {   
        // Check if loggedin
        if(Auth::check()){
            if(Auth::user()->role()->first()->name != 'user'){
                return redirect('/admin');
            }
            return null;
        }
    }
}
