@extends('user.layouts.master')

{{-- Title --}}
@section('title','Update Contact')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Contact</h1>
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
                                <h1 class="h4 text-gray-900 mb-4">Contact Details</h1>
                            </div>
                            <form class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="first_name" id="first_name" aria-describedby="first_nameHelp" placeholder="Firstname"/>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="last_name" id="last_name" aria-describedby="last_nameHelp" placeholder="Lastname"/>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="contact_no" id="contact_no" aria-describedby="contact_noHelp" placeholder="Contact No."/>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="address" id="address" aria-describedby="addressHelp" placeholder="Address"></textarea>
                                </div>

                                <a href="index.html" class="btn btn-primary btn-user btn-block">
                                    Update Contact
                                </a>
                            </form>
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