@extends('shared.layouts.master')

{{-- Title --}}
@section('title','Contacts')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pokemons</h1>
            <a href="{{ route('scrap.pokemons') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Scrap Pokemons</a>
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
                        <caption class="float-left">List of all pokemons</caption>
                        {{-- <br/>
                        <div class="dropdown show float-left">
                            <a class="btn btn-success dropdown-toggle {{ count($pokemons) ? '' : 'disabled' }}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                            </a>
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a data-toggle="tooltip" data-placement="top" title="Export as Excel" class="dropdown-item" href="{{ route('export.contacts').'?search='.request()->input('search').'&export=xlsx' }}">Excel</a>
                            <a data-toggle="tooltip" data-placement="top" title="Export as Csv" class="dropdown-item" href="{{ route('export.contacts').'?search='.request()->input('search').'&export=csv' }}">CSV</a>
                            <a data-toggle="tooltip" data-placement="top" title="Export as Pdf" class="dropdown-item" href="{{ route('export.contacts').'?search='.request()->input('search').'&export=pdf' }}">PDF</a>
                            </div>
                        </div> --}}
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
                        <br/>
                        <div class="row my-5">
                            @if(count($pokemons) > 0)
                                @foreach ($pokemons as $key => $pokemon)
                                    @php
                                        $types = explode(",", $pokemon->types);
                                        $types_href = explode(",", $pokemon->types_href);
                                    @endphp
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div class="card mt-1 w-100">
                                            <img class="card-img-top w-50 mx-auto" src="{{ $pokemon->img }}" alt="Pokemon">
                                            
                                            <div class="card-body">
                                                <center>{{ $pokemon->no }}</center>
                                                <center><a href="{{ $pokemon->link }}" target="_blank"><b>{{ $pokemon->title }}</b></a></center>
                                                <p class="card-text text-center">
                                                    @foreach ($types as $type)
                                                        @if($type == 'Grass')
                                                            <a href="{{ url('https://pokemondb.net/type/grass') }}" class="text-success" target="_blank">{{ $type }}</a>
                                                        @elseif($type == 'Poison')
                                                            <a href="{{ url('https://pokemondb.net/type/poison') }}" class="text-secondary" target="_blank">{{ $type }}</a>
                                                        @elseif($type == 'Fire')
                                                            <a href="{{ url('https://pokemondb.net/type/fire') }}" class="text-danger" target="_blank">{{ $type }}</a>
                                                        @elseif($type == 'Water')
                                                            <a href="{{ url('https://pokemondb.net/type/water') }}" class="text-primary" target="_blank">{{ $type }}</a>
                                                        @elseif($type == 'Bug')
                                                            <a href="{{ url('https://pokemondb.net/type/bug') }}" class="text-dark" target="_blank">{{ $type }}</a>
                                                        @elseif($type == 'Flying')
                                                            <a href="{{ url('https://pokemondb.net/type/flying') }}" class="text-info" target="_blank">{{ $type }}</a>
                                                        @elseif($type == 'Electric')
                                                            <a href="{{ url('https://pokemondb.net/type/electric') }}" class="text-danger" target="_blank">{{ $type }}</a>
                                                        @else
                                                            <a href="{{ url("https://pokemondb.net/type/") }}{{ Str::lower($type) }}" class="text-muted" target="_blank">{{ $type }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center mt-5">No pokemon found</div>
                            @endif
                        </div>
                        @include('shared.pagination.paginator', ['paginator' => $pokemons])
                    </div>
              </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->    
@endsection

@section('custom_js_plugin')

@endsection