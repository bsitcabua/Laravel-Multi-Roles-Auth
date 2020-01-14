@extends('shared.layouts.master')

{{-- Title --}}
@section('title','Update Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Profile</h1>
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

                            <form class="user" method="POST" action="{{ url("/profile/".auth()->user()->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">

                                    <input 
                                        type="text" 
                                        class="form-control form-control-user {{ (isset(session('error')['first_name'])) ? 'is-invalid' : '' }}" 
                                        value="{{ (session('error')) ? old('first_name') : auth()->user()->first_name }}" 
                                        name="first_name" 
                                        id="first_name" 
                                        placeholder="Firstname"
                                    />

                                    <div class="invalid-feedback">
                                        {{ (isset(session('error')['first_name'])) ? session('error')['first_name'][0] : '' }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input 
                                        type="text" 
                                        class="form-control form-control-user {{ (isset(session('error')['last_name'])) ? 'is-invalid' : '' }}" 
                                        value="{{ (session('error')) ? old('last_name') : auth()->user()->last_name }}" 
                                        name="last_name" 
                                        id="last_name" 
                                        placeholder="Lastname"
                                    />
                                    <div class="invalid-feedback">
                                        {{ (isset(session('error')['last_name'])) ? session('error')['last_name'][0] : '' }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input 
                                        type="text" 
                                        class="form-control form-control-user {{ (isset(session('error')['contact_no'])) ? 'is-invalid' : '' }}" 
                                        value="{{ (session('error')) ? old('contact_no') : auth()->user()->contact_no }}" 
                                        name="contact_no" 
                                        id="contact_no" 
                                        placeholder="Contact No."
                                    />
                                    <div class="invalid-feedback">
                                        {{ (isset(session('error')['contact_no'])) ? session('error')['contact_no'][0] : '' }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input 
                                        type="email" 
                                        class="form-control form-control-user {{ (isset(session('error')['email'])) ? 'is-invalid' : '' }}" 
                                        value="{{ (session('error')) ? old('email') : auth()->user()->email }}" 
                                        name="email" 
                                        id="email" 
                                        placeholder="Email"
                                    />
                                    <div class="invalid-feedback">
                                        {{ (isset(session('error')['email'])) ? session('error')['email'][0] : '' }}
                                    </div>
                                </div>

                                <div class="text-center">
                                    <small class="text-dark">Leave it blank if you don't want to change password</small class="text-dark">
                                </div>
                                <hr/>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3 mb-sm-0">
                                        <input 
                                            type="password" 
                                            class="form-control form-control-user {{ (isset(session('error')['password'])) ? 'is-invalid' : '' }}" 
                                            name="password" 
                                            id="password" 
                                            placeholder="Password"
                                        />
                                        <div class="invalid-feedback">
                                            {{ (isset(session('error')['password'])) ? session('error')['password'][0] : '' }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input 
                                            type="password" 
                                            class="form-control form-control-user {{ (isset(session('error')['password'])) ? 'is-invalid' : '' }}" 
                                            name="password_confirmation" 
                                            id="password_confirmation" 
                                            placeholder="Repeat Password"
                                        />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update Profile
                                </button>
                            </form>
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