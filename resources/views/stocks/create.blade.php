@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Stock</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            @php
                    if (Auth::user()->role->name == 'ppic') {
                        # code...
                        $uri = route('store.stock.ppic');
                        $uri_index = route('index.stock.ppic');
                    } else if(Auth::user()->role->name == 'purchasing'){
                        # code...
                        $uri = route('store.stock');
                        $uri_index = route('index.stock');
                    }
                    
                @endphp
            <form action="{{ $uri }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">No PO</label>
                        <input type="text" name="nopo" class="form-control {{ $errors->has('nopo') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nopo', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tanggal PO</label>
                        <input type="date" name="tanggalpo" class="form-control {{ $errors->has('tanggalpo') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tanggalpo', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Nomor Barang</label>
                        <select name="nomorbarang" class="form-control">
                            <option value=""></option>
                            @foreach (App\Report::all() as $kode_barang)
                                <option value="{{ $kode_barang->nomorbarang }}">{{ $kode_barang->nomorbarang }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="nomorbarang" class="form-control {{ $errors->has('nomorbarang') ? 'is-invalid' : ''}}" required> --}}
                        {!! $errors->first('nomorbarang', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Nama Barang</label>
                        {{-- <input type="text" name="namabarang" class="form-control {{ $errors->has('namabarang') ? 'is-invalid' : ''}}" required> --}}
                        <select name="namabarang" class="form-control">
                            <option value=""></option>
                            @foreach (App\Report::all() as $nama_barang)
                                <option value="{{ $nama_barang->namabarang }}">{{ $nama_barang->namabarang }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('namabarang', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kuantitas</label>
                        <input type="number" name="kuantitas" class="form-control {{ $errors->has('kuantitas') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kuantitas', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Supplier</label>
                        {{-- <input type="text" name="supplier" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : ''}}" required> --}}
                        <select name="supplier" class="form-control">
                            <option value=""></option>
                            @foreach (App\Supplier::all() as $supplier)
                                <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('supplier', '<span class="invalid-feedback">:message</span>') !!}
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
