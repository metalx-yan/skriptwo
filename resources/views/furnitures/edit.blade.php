@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $get->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Judul</label>
                        <input type="text" name="header" class="form-control {{ $errors->has('header') ? 'is-invalid' : ''}}" value="{{ $get->header }}" required>
                        {!! $errors->first('header', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="form-control" required>
                            <option value="">Select Kategori</option>
                            @foreach (App\Category::all() as $cat)
                                <option value="{{ $cat->flag }}" {{$get->category_id == $cat->flag ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Gambar</label>
                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : ''}}" value="{{ $get->image }}" >
                        {!! $errors->first('image', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : ''}}" value="{{ $get->deskripsi }}" required>
                        {!! $errors->first('deskripsi', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
