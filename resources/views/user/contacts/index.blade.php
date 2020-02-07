@extends('shared.layouts.master')

{{-- Title --}}
@section('title','Contacts')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contacts</h1>
            <a href="{{ url('/contacts/create') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
              <div class="card h-100 py-2">
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
                                <input type="text" class="form-control" name="search" id="search" value="{{ strip_tags(request()->input('search')) }}" placeholder="Name, email, contact no., address" {{ (request()->input('search')) ? 'autofocus' : '' }}>
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
                      
                        @include('shared.pagination.paginator', ['paginator' => $contacts])
                  </div>
              </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->    
@endsection

@section('custom_js_plugin')

@endsection