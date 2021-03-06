<div class="card-body table-responsive" style="min-height: 350px;">
    <caption class="float-left">List of all contacts</caption>
    <br/>
    <div class="dropdown show float-left">
      <a class="btn btn-success dropdown-toggle {{ count($contacts) ? '' : 'disabled' }}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Export
      </a>
      
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a data-toggle="tooltip" data-placement="top" title="Export as Excel" class="dropdown-item" href="{{ route('export.contacts').'?search='.request()->input('search').'&export=xlsx' }}">Excel</a>
        <a data-toggle="tooltip" data-placement="top" title="Export as Csv" class="dropdown-item" href="{{ route('export.contacts').'?search='.request()->input('search').'&export=csv' }}">CSV</a>
        <a data-toggle="tooltip" data-placement="top" title="Export as Pdf" class="dropdown-item" href="{{ route('export.contacts').'?search='.request()->input('search').'&export=pdf' }}">PDF</a>
      </div>
    </div>
    <div class="float-right">
        <form method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" id="search" wire:model="search" value="{{ strip_tags(request()->input('search')) }}" placeholder="Name, email, contact no., address" {{ (request()->input('search')) ? 'autofocus' : '' }}>
              <div class="input-group-append">
                <button type="submit" class="btn btn-md btn-primary">Search</button>
              </div>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Contact No.</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($contacts) > 0)
            @foreach ($contacts as $key => $contact)
              <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>
                  <a href="{{ url("/contacts/$contact->id") }}" title="View">
                    {{ $contact->first_name.' '.$contact->last_name }}
                  </a>
                </td>
                <td>{{ $contact->contact_no }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->address }}</td>
                <td class="text-center">
                  <form method="post" action="{{ url("/contacts/$contact->id") }}">
                    @method("DELETE")
                    @csrf

                    <a href="{{ url("/contacts/$contact->id") }}" class="mb-sm-1 mb-lg-0 mr-lg-1 btn btn-sm btn-info btn-icon-split" title="View">
                        <span class="icon text-white-50">
                          <i class="fa fa-eye"></i>
                        </span>
                    </a>

                    <a href="{{ url("/contacts/$contact->id/edit") }}" class="mb-sm-1 mb-lg-0 btn btn-sm btn-success btn-icon-split" title="Edit">
                        <span class="icon text-white-50">
                          <i class="fa fa-pen"></i>
                        </span>
                    </a>
                    
                    <button type="submit" onclick="return confirm('Delete contact?')" class="mt-sm-1 mt-lg-0 ml-lg-1 btn btn-sm btn-danger btn-icon-split" title="Delete">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                    </button>
                  </form>
                    
                </td>
              </tr>
            @endforeach

          @else
            <tr>
              <th scope="row" colspan="12" class="text-center">No data found</th>
            </tr>
          @endif
          
        </tbody>
      </table>
    
      @include('shared.livewire.paginator', ['paginator' => $contacts])
</div>