@extends('main')
@section('bootstrap')

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-hbhGm5j0+4ee2C0JbXKCKFgvHECHTe4UhpqYJxxK+xABPFkKnQZbW+wRXP8d+2GJB6fPzUWVHMvl3vZqRk5q+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{asset ('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset ('style/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset ('style/vendors/datatables.net/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset ('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{asset ('style/assets/js/jquery.printPage.js')}}">
<link rel="stylesheet" href="{{asset('style/assets/css/style.css')}}">


@endsection
@push('page-action'){
    <a href="{{ route('parkir.cetak_pdf') }}" class="btn btn-success btn-sm" style="float:right"> Export PDF
        <i class="fa fa-solid fa-print"></i>
    </a>
    <script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
        </script>
}
    
@endpush

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
                    <div class="card-header">
                        <div class="card-body">
                            <div id="grafik"></div>
                        </div>
                    </div>
                </div>
            </div><!-- /# column -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">DATA KENDARAAN</strong>
                        @stack('page-action')
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
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($parkirKeluar as $parkir)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$parkir->kode_karcis}}</td>
                                    <td>{{$parkir->nomor_plat}}</td>
                                    <td>{{$parkir->jenis}}</td>
                                    <td>{{ \Carbon\Carbon::parse($parkir->waktu_masuk)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($parkir->waktu_masuk)->format('H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($parkir->waktu_keluar)->format('H:i:s') }}</td>
                                    <td>{{$parkir->penjaga}}</td>
                                    <td>{{$parkir->lokasi}}</td>
                                </tr>
                                @endforeach
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="{{asset ('style/vendors/jquery/dist/jquery-3.6.4.min.js')}}"></script>
<script type="text/javascript" charset="utf8"
    src="{{asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('style/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<script type="text/javascript">
    var totalsPerDay = <?php echo json_encode($totalsPerDay)?>;

    Highcharts.chart('grafik', {
        title: {
            text: "Laporan Harian Kendaraan"
        },
        xAxis: {
            categories: totalsPerDay.map(item => item.harian)
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Motor',
            data: totalsPerDay.map(item => item.total_motor)
        }, {
            name: 'Mobil',
            data: totalsPerDay.map(item => item.total_mobil)
        }]
    });
</script>
@endsection
