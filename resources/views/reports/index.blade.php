@extends('main')



@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Report</li>
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
                    if (Auth::user()->role->name == 'pimpinan') {
                        # code...
                        $uri = route('create.report.pimpinan');
                        $uri_edit = 'edit.report.pimpinan';
                        $uri_des = 'destroy.report.pimpinan';
                    } elseif (Auth::user()->role->name == 'purchasing') {
                        # code...
                        $uri = route('create.report');
                        $uri_edit = 'edit.report';
                        $uri_des = 'destroy.report';
                    } else {
                        $uri = route('reports.create');
                        $uri_edit = 'reports.edit';
                        $uri_des = 'reports.destroy';
                    }
                    
                @endphp
                <a href="{{ $uri }}" class="btn btn-primary btn-sm">Tambah Report</a>
                <br>
                <br>
                <table class="table border" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Barang</th>
                            <th>Nama Barang</th>
                            <th>Kuantitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nomorbarang }}</td>
                                <td>{{ $item->namabarang }}</td>
                                <td>{{ $item->kuantitas }}</td>
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
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'csv'
                ]
            });
        });
    </script>
@endsection
