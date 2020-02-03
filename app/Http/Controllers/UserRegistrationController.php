<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use App\Http\Controllers\BaseController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Redirect,Response,Config;
use Mail;

class UserRegistrationController extends BaseController
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('shared.pages.register');
    }

    public function store(RegisterRequest $request)
    {
        // Validation
        if($response = $this->validateRequest($request)){
            $response = $response['validator']->messages();
            return back()->withInput()->with('error', $response);
        }

        DB::beginTransaction();

        try{
            
            $payload = [
                'first_name'   => strip_tags($request->first_name),
                'last_name'    => strip_tags($request->last_name),
                'contact_no'   => strip_tags($request->contact_no),
                'email'        => strip_tags($request->email),
                'password'     => bcrypt($request->password)
            ];

            // Save user
            $user = User::create($payload);

            // Save user role
            $payload = [
                'user_id'               => strip_tags($user->id),
                'role_id'               => 3, //user
            ];

            $userRole = UserRole::create($payload);

            DB::commit();

            if(!$userRole->id){
                return back()->withErrors([ 'error_msg' => 'Account couldn\'t register pls try again!'])->withInput();
            }

            // Send email
            $this->sendEmail($user->email);

            // Logged user in
            auth()->login($user);

            // Redirect
            return redirect('/');

        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function sendEmail($email)
    {
        $data['title'] = "Verify Your Account";
 
        Mail::send('email_layouts.resgistration', $data, function($message) use($email) {
 
            $message->to($email)
                    ->subject('New Account Register');
        });
 
        if (Mail::failures()) {
           return 'Sorry! Please try again latter';
         }else{
           return 'Great! Successfully send in your mail';
         }
    }
}
