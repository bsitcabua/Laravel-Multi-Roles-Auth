@extends('user.layouts.master')

{{-- Title --}}
@section('title','Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
        <!-- Content Row -->
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card h-100 py-2 m-auto w-50" style="min-width: 350px">
                    <div class="card-body" style="min-height: 350px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Profile Details</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ url("/profile/".auth()->user()->id."/edit") }}"><i class="fa fa-pen text-sm text-danger"></i></a>
                            </div>
                            <p title="Firstname">
                                {{ (auth()->user()->first_name) ? auth()->user()->first_name : 'N/A' }}
                            </p>

                            <p title="Lastname">
                                {{ (auth()->user()->last_name) ? auth()->user()->last_name : 'N/A' }}
                            </p>

                            <p title="Contact no.">
                                {{ (auth()->user()->contact_no) ? auth()->user()->contact_no : 'N/A' }}
                            </p>

                            <p title="Email">
                                {{ (auth()->user()->email) ? auth()->user()->email : 'N/A' }}
                            </p>

                            <p title="Role">
                                {{ (auth()->user()->role()->name) ? ucfirst(auth()->user()->role()->name) : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->    
@endsection

@section('custom_js_plugin')

@endsection