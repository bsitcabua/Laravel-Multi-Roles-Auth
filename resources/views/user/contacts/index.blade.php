@extends('user.layouts.master')

{{-- Title --}}
@section('title','Contacts')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contacts</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100 py-2">
                <div class="card-body table-responsive" style="min-height: 350px;">
                    <caption class="float-left">List of all contacts</caption>
                    <div class="float-right">
                        <form>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Name, email, contact no., address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-md btn-primary">Search</button>
                                </div>
                              </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID #</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td class="text-center">
                                <a href="{{ url('/contacts/1/edit') }}" class="mb-sm-1 mb-lg-0 mr-lg-1 btn btn-sm btn-success btn-icon-split" title="Edit">
                                    <span class="icon text-white-50">
                                      <i class="fa fa-pen"></i>
                                    </span>
                                    {{-- <span class="text">Edit</span> --}}
                                </a>
                            
                                <a href="#" onclick="return confirm('Delete contact?')" class="mt-sm-1 mt-lg-0 ml-lg-1 btn btn-sm btn-danger btn-icon-split" title="Delete">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    {{-- <span class="text">Delete</span> --}}
                                </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->    
@endsection

@section('custom_js_plugin')

@endsection