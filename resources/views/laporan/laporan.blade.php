@extends('main')
@section('bootstrap')

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-hbhGm5j0+4ee2C0JbXKCKFgvHECHTe4UhpqYJxxK+xABPFkKnQZbW+wRXP8d+2GJB6fPzUWVHMvl3vZqRk5q+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{asset ('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset ('style/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset ('style/vendors/datatables.net/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset ('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{asset('style/assets/css/style.css')}}">


@endsection

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>LAPORAN</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div style="width: 80%; margin: auto;">
                        <canvas id="sales-chart"></canvas>
                    </div>

                </div>
            </div><!-- /# column -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">DATA KENDARAAN</strong>
                        <button class="btn btn-success btn-sm" style="float:right">
                            Export PDF
                            <i class="fa fa-regular fa-file-pdf"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">

                            <thead>
                                <tr>
                                    <th>No
                                    </th>
                                    <th>Kode Karcis
                                    </th>
                                    <th>Nomor Plat
                                    </th>
                                    <th>Jenis
                                    </th>
                                    <th>Tanggal
                                    </th>
                                    <th>Jam Masuk
                                    </th>
                                    <th>Jam Keluar
                                    </th>
                                    <th>Penjaga
                                    </th>
                                    <th>Lokasi Parkir
                                    </th>
                                    <th>Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>13232</td>
                                    <td>H 1234 SZE</td>
                                    <td>Motor</td>
                                    <td>13 Januari 2023</td>
                                    <td>13.00</td>
                                    <td>14.00</td>
                                    <td>Susanto</td>
                                    <td>Elektro</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa fa-solid fa-pencil"></i>
                                        </button>
                                        <!-- Tombol Delete -->
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('script')
<script src="{{asset ('style/vendors/jquery/dist/jquery-3.6.4.min.js')}}"></script>
<script type="text/javascript" charset="utf8"
    src="{{asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('style/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
<script src="{{asset ('style/assets/js/init-scripts/chart-js/chartjs-init.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

</script>
<script>
    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
            "November", "December"
        ],
        datasets: [{
                label: 'Mobil',
                data: [50, 60, 70, 80, 90, 45, 40, 120, 130, 140, 150, 160],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.1
            },
            {
                label: 'Motor',
                data: [30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140],
                borderColor: 'rgba(255, 0, 0, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.1
            }
        ]
    };

    var canvas = document.getElementById('sales-chart');

    canvas.width = window.innerWidth * 0.8;
    canvas.height = window.innerHeight * 0.5;

    var ctx = canvas.getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    display: true,
                },
                y: {
                    display: true,
                }
            }
        }
    });


    window.addEventListener('resize', function () {
        canvas.width = window.innerWidth * 0.8;
        canvas.height = window.innerHeight * 0.5;
        myChart.update();
    });

</script>
@endsection
