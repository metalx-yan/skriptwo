@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Stock</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-title">

            </div>
            @php
                $no = 1;
            @endphp
            <div class="card-body">

                @php
                    if (Auth::user()->role->name == 'ppic') {
                        # code...
                        $uri = route('create.stock.ppic');
                        $uri_edit = 'edit.stock.ppic';
                        $uri_des = 'destroy.stock.ppic';
                    } elseif (Auth::user()->role->name == 'purchasing') {
                        # code...
                        $uri = route('create.stock');
                        $uri_edit = 'edit.stock';
                        $uri_des = 'destroy.stock';
                    }
                    
                @endphp
                <a href="{{ $uri }}" class="btn btn-primary btn-sm">Tambah Stock</a>
                <br>
                <br>
                <table class="table border" id="myTable">
                    <thead>
                        <tr>
                            <th>No PO</th>
                            <th>Tanggal PO</th>
                            <th>Nomor Barang</th>
                            <th>Nama Barang</th>
                            <th>Kuantitas</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $item->nopo }}</td>
                                <td>{{ $item->tanggalpo }}</td>
                                <td>{{ $item->nomorbarang }}</td>
                                <td>{{ $item->namabarang }}</td>
                                <td>{{ $item->kuantitas }}</td>
                                <td>{{ $item->supplier }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route($uri_edit, $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <form action="{{ route($uri_des, $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
