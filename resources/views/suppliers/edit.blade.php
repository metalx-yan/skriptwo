@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Supplier</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            @php
                    if (Auth::user()->role->name == 'administrator') {
                        # code...
                        $uri = 'suppliers.update';
                        $uri_index = route('suppliers.index');
                    } else if(Auth::user()->role->name == 'purchasing'){
                        # code...
                        $uri = 'update.purchasing';
                        $uri_index = route('index.purchasing');
                    }
                    
                @endphp
            <form action="{{ route($uri, $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama Barang</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{ $get->name }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ $uri_index }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
