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
            <form action="{{ route('stocks.store') }}" method="post">
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
                    <div class="col-md-3">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('supplier', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('stocks.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
