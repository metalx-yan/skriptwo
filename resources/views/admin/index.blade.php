@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <h2>
                    <center>Grafik Stock Barang</center>
                </h2>
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nama Barang</label>
                            <select class="form-control" id="barang">
                                <option value="">Select Barang</option>
                                @foreach (App\Report::all() as $data)
                                    <option value="{{ $data->id }}">{{ $data->namabarang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Kuantitas</label>
                            <input type="text" readonly id="qty" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Status</label>
                            <input type="text" readonly id="status" class="form-control">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>

    <script>
        $("#barang").on('change', function(e) { // 2nd way
            var val = e.target.value
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // console.log(CSRF_TOKEN)
            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route('reportzz') }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: CSRF_TOKEN,
                    id: val
                },
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function(data) {
                    console.log(data)
                    if (data == null) {
                        $('#qty').val('')
                        $('#status').val('')
                    } else {
                        $('#qty').val(data.kuantitas + ' Kg')
                        if (data.kuantitas > '200') {
                            $('#status').val('Stock Tersedia')
                        } else {
                            $('#status').val('Stock Tidak Tersedia')
                        }

                    }

                    $('#myTable').DataTable();

                    Highcharts.chart('container', {

                        title: {
                            text: 'Chart Barang',
                            align: 'left'
                        },

                        subtitle: {
                            text: '',
                            align: 'left'
                        },

                        yAxis: {
                            title: {
                                text: 'Number'
                            }
                        },

                        xAxis: {
                            accessibility: {
                                rangeDescription: ''
                            }
                        },

                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },

                        plotOptions: {
                            series: {
                                label: {
                                    connectorAllowed: false
                                },
                                pointStart: new Date(data.created_at).getFullYear() -1
                            }
                        },

                        series: [{
                            name: data.namabarang,
                            data: [0,data.kuantitas]

                        }],

                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]
                        }

                    });

                }
            });
        });
    </script>
@endsection
