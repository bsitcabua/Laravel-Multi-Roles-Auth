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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card h-100 py-2">
                    <div class="card-body" style="min-height: 350px;">
                            <div class="col-lg-12 m-auto w-50">
                                <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Profile Details</h1>
                                </div>
                                    <div class="float-right">
                                        <a href="{{ url('/profile/1/edit') }}"><i class="fa fa-pen text-sm text-danger"></i></a>
                                    </div>
                                    <p>
                                        EM
                                    </p>

                                    <p>
                                        Cabua
                                    </p>

                                    <p>
                                        09322996632
                                    </p>

                                    <p>
                                        bsitcabua@gmail.com
                                    </p>

                                    <p>
                                        814 Englis V.rama Avenue Cebu City, Cebu PH
                                    </p>

                                    {{-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                        Update Contact
                                    </a> --}}
                                </div>
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