<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            return view('user.profile.index');

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            User::findOrFail($id);

            return view('user.profile.edit');

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        // Validation
        if($response = $this->validateRequest($request)){
            $response = $response['validator']->messages();
            return back()->withInput()->with('error', $response);
        }

        try {

            // Check email if exist from other user
            $checkEmail = User::where('email' ,strip_tags($request->email))
                                ->where('id', '!=', Auth::user()->id)
                                ->first();
            if($checkEmail){
                $response['email'][0] = 'Email already been taken!';
                return back()->withInput()->with('error', $response);
            }

            $user = User::find(Auth::user()->id);

            $user->first_name    = strip_tags($request->first_name);
            $user->last_name     = strip_tags($request->last_name);
            $user->email         = strip_tags($request->email);
            $user->contact_no    = strip_tags($request->contact_no);

            // Update password if not null
            if($request->password){
                $user->password = Hash::make($request->password);
            }

            if ($user->save()){
                return back()->with('msg', "Profile details updated successfully!");
            }
            return back()->withErrors([ 'error_msg' => 'Profile details couldn\'t update'])->withInput();

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
