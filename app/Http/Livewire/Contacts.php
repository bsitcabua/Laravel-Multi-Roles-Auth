<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Contacts extends Component
{
    use WithPagination;

    public $search;
    public $currentPage = 1;

    public function setPage($url)
    {
        dd($url);
    
        // $this->currentPage = explode('page=', $url)[1];

        // Paginator::currentPageResolver(function(){
        //     return $this->currentPage;
        // });
    }

    public function render()
    {
        $contacts = User::find(Auth::user()->id)->contacts();

        $search = strip_tags($this->search);
            
        $search = preg_replace('/\s+/', ' ', $search); // Remove double space

        if($search){
            $contacts = $this->searcContacts($contacts, $search);
        }

        $contacts = $contacts->paginate(10);

        return view('livewire.contacts', ["contacts" => $contacts]);
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
}
