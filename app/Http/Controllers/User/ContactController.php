<?php

namespace App\Http\Controllers\User;

use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreUpdateContactRequest;
use Illuminate\Support\Facades\Storage;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends BaseController
{
    
    public function index()
    {
        try {

            $search = strip_tags(request()->input('search'));
            $export = strip_tags(request()->input('export'));
            
            $search = preg_replace('/\s+/', ' ', $search); // Remove double space
            // Get all contacts based on user id
            $contacts = Contact::where('user_id', Auth::user()->id);

            // If search not null do search
            if($search){
                $contacts = $this->searcContacts($contacts, $search);
            }

            $contacts = $contacts->paginate(10);
            
            return view('user.contacts.index', ['contacts' => $contacts]);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function searcContacts($model, $search)
    {
        $result = $model->where(function($query) use($search) {
                    $query->where('first_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('contact_no', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('address', 'LIKE', '%' . $search . '%')
                        ->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', "%". $search . "%");
        });

        return $result;
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
    public function store(StoreUpdateContactRequest $request)
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
                return back()->with('msg', "$request->first_name's contact added successfully!");
            }
            return back()->withErrors([ 'error_msg' => 'Contact couldn\'t update'])->withInput();

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
        try {

            $contact = Contact::findOrFail($id);
            
            return view('user.contacts.show', ['contact' => $contact]);

        } catch (\Throwable $e) {
            throw $e;
        }
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

            $contact = Contact::findOrFail($id);
            
            return view('user.contacts.edit', ['contact' => $contact]);

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
    public function update(StoreUpdateContactRequest $request, $id)
    {
        // Validation
        if($response = $this->validateRequest($request)){
            $response = $response['validator']->messages();
            return back()->withInput()->with('error', $response);
        }

        try {

            $contact = Contact::find($id);

            $contact->first_name    = strip_tags($request->first_name);
            $contact->last_name     = strip_tags($request->last_name);
            $contact->email         = strip_tags($request->email);
            $contact->address       = strip_tags($request->address);
            $contact->contact_no    = strip_tags($request->contact_no);

            if ($contact->save()){
                return back()->with('msg', "Contact details updated successfully!");
            }
            return back()->withErrors([ 'error_msg' => 'Contact details couldn\'t update'])->withInput();

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
        // Validation
        if(!$id){
            return back()->withErrors(
                [ 'error_msg' => 'Opps! Something went wrong.']
            );
        }

        try {

            $contact = Contact::find($id);

            if($contact){
                if($contact->delete()){
                    return back()->with('msg', "$contact->first_name's contact deleted successfully!");
                }
            }

            return back()->withErrors([ 'error_msg' => 'Contact already deleted'])->withInput();

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function export()
    {
        set_time_limit(300);
        
        try {

            $search = strip_tags(request()->input('search'));
            $search = preg_replace('/\s+/', ' ', $search); // Remove double space
            $export = strip_tags(request()->input('export')); // extention

            // Get all contacts based on user id
            $contacts = Contact::where('user_id', Auth::user()->id);

            // If search not null do search
            if($search){
                $contacts = $this->searcContacts($contacts, $search);
            }

            $filename = 'contacts_'.date('Y_m_d_H_i_s').'.'.$export;
            $userFullname = Auth::user()->last_name.'_'.Auth::user()->first_name;
            
            $contacts = $contacts->get();

            if($export == 'xlsx' || $export == 'csv'){
                return Excel::download(new ContactsExport($contacts), $filename);  
            }
            elseif($export == 'pdf'){
                $pdf = \PDF::loadView('user.contacts.pdf', \compact('contacts'));
                Storage::put('public/pdf/'.$userFullname.'_'.$filename, $pdf->output());
                return $pdf->download($filename);
            }
            return back();
        } catch (\Throwable $e) {
            throw $e;
        }
        // Store to disk
        // Excel::store(new ContactsExport($query), 'contacts.csv');
        // dd('Done');
    }
}
