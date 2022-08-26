@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Product</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('finishings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Judul</label>
                        <input type="text" name="header" class="form-control {{ $errors->has('header') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('header', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="form-control" required>
                            <option value="">Select Kategori</option>
                            @foreach (App\Category::where('id',4)->get() as $cat)
                                <option value="{{ $cat->flag }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('image', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('deskripsi', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('finishings.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
