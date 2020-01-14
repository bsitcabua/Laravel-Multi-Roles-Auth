@extends('shared.layouts.master')

{{-- Title --}}
@section('title','Dashboard')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="{{ url('/contacts/create') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a> --}}
        </div>
        
    </div>
    <!-- /.container-fluid -->    
@endsection

@section('custom_js_plugin')

@endsection