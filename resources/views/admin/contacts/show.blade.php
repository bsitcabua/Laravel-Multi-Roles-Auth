@extends('shared.layouts.master')

{{-- Title --}}
@section('title','View Contact')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Contact</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
        <!-- Content Row -->
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card h-100 py-2 m-auto w-50" style="min-width: 350px">
                    <div class="card-body" style="min-height: 350px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Contact Details</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ url("/contacts/$contact->id/edit") }}" title="Edit contact"><i class="fa fa-pen text-sm text-danger"></i></a>
                            </div>
                            <p title="Firstname">
                                {{ ($contact->first_name) ? $contact->first_name : 'N/A' }}
                            </p>

                            <p title="Lastname">
                                {{ ($contact->last_name) ? $contact->last_name : 'N/A' }}
                            </p>

                            <p title="Contact no.">
                                {{ ($contact->contact_no) ? $contact->contact_no : 'N/A' }}
                            </p>

                            <p title="Email">
                                {{ ($contact->email) ? $contact->email : 'N/A' }}
                            </p>

                            <p title="Address">
                                {{ ($contact->address) ? $contact->address : 'N/A' }}
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