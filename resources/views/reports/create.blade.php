@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Report</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            @php
            if (Auth::user()->role->name == 'pimpinan') {
                # code...
                $uri = route('store.report.pimpinan');
                $uri_index = route('index.report.pimpinan');
            } else if(Auth::user()->role->name == 'purchasing'){
                # code...
                $uri = route('store.report');
                $uri_index = route('index.report');
            } else {
                $uri = route('reports.store');
                $uri_index = route('reports.index');
            }
            
        @endphp
            <form action="{{ $uri }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nomor Barang</label>
                        <input type="text" name="nomorbarang" class="form-control {{ $errors->has('nomorbarang') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nomorbarang', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Nama Barang</label>
                        <input type="text" name="namabarang" class="form-control {{ $errors->has('namabarang') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('namabarang', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kuantitas</label>
                        <input type="number" name="kuantitas" class="form-control {{ $errors->has('kuantitas') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kuantitas', '<span class="invalid-feedback">:message</span>') !!}
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
