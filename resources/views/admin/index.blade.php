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
                    <br><hr>
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
                        pointStart: 2010
                    }
                },

                series: [{
                    name: 'Installation & Developers',
                    data: [43934, 48656, 65165, 81827, 112143, 142383,
                        171533, 165174, 155157, 161454, 154610
                    ]
                }, {
                    name: 'Manufacturing',
                    data: [24916, 37941, 29742, 29851, 32490, 30282,
                        38121, 36885, 33726, 34243, 31050
                    ]
                }, {
                    name: 'Sales & Distribution',
                    data: [11744, 30000, 16005, 19771, 20185, 24377,
                        32147, 30912, 29243, 29213, 25663
                    ]
                }, {
                    name: 'Operations & Maintenance',
                    data: [null, null, null, null, null, null, null,
                        null, 11164, 11218, 10077
                    ]
                }, {
                    name: 'Other',
                    data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,
                        17300, 13053, 11906, 10073
                    ]
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
                    } else {
                        $('#qty').val(data.kuantitas + ' Kg')
                        if (data.kuantitas > '200') {
                            $('#status').val('Stock Tersedia')
                        } else {
                            $('#status').val('Stock Tidak Tersedia')
                        }

                    }
                }
            });
        });
    </script>
@endsection
