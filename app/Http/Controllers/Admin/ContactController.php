<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    public function index()
    {
        try {

            $search = strip_tags(request()->input('search'));

            // Get all contacts based
            $contacts = new Contact();

            // If search no null do search
            if($search){
                $contacts = $contacts->where(function($query) use($search) {
                    $query->where('first_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('contact_no', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('address', 'LIKE', '%' . $search . '%')
                        ->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', "%". $search . "%");
                });
            }

            $contacts = $contacts->paginate(10);
            
            return view('admin.contacts.index', ['contacts' => $contacts]);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function show($id)
    {
        try {

            $contact = Contact::findOrFail($id);
            
            return view('user.contacts.show', ['contact' => $contact]);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function edit($id)
    {
        try {

            $contact = Contact::findOrFail($id);
            
            return view('admin.contacts.edit', ['contact' => $contact]);

        } catch (\Throwable $e) {
            throw $e;
        }
        
    }
}
