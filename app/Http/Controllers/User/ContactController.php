<?php

namespace App\Http\Controllers\User;

use App\Contact;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreContactRequest;

class ContactController extends BaseController
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if($this->isUserRole()){
                return $this->isUserRole();
            }
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('user.contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        // Validation
        if($response = $this->validateRequest($request)){
            $response = $response['validator']->messages();
            return back()->withInput()->with('error', $response);
        }
        
        try{
            
            $payload = [
                'first_name'   => strip_tags($request->first_name),
                'last_name'    => strip_tags($request->last_name),
                'address'      => strip_tags($request->address),
                'contact_no'   => strip_tags($request->contact_no),
                'email'        => strip_tags($request->email),
                'user_id'      => auth()->user()->id,
            ];

            $contact = new Contact($payload);

            if ($contact->save()){
                return back()->with('msg', 'Contact added successfully!');
            }
            return back()->withErrors([ 'error_msg' => 'Invalid credentials'])->withInput();

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.contacts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
