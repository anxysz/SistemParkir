@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>DASHBOARD</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <!-- <li><a href="#">Dashboard</a></li> -->
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="app" class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Parkiran Politeknik Negeri Semarang</strong>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" width="100" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Parkiran Elektro</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Card untuk Parkiran Elektro -->
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Kendaraan Parkir </h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;"> {{ $totalRecords }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- Card untuk Parkiran Elektro -->
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Maksimal Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ totalMaksimalParkir }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- Card untuk Parkiran Elektro -->
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <h4 class="card-title">Jumlah Admin Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ jumlahadminparkir }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            totalKendaraanParkir: 15,
            totalMaksimalParkir: 500,
            jumlahadminparkir: 3,
        }
    });

    var totalMotor = {{ $totalMotor }};
    var totalMobil = {{ $totalMobil }};
    var totalRecords = {{ $totalRecords }};

    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Motor', 'Mobil'],
            datasets: [{
                label: '# of Vehicles',
                data: [totalMotor, totalMobil],
                backgroundColor: [
                    'rgba(255, 0, 0, 0.2)', // Red for Motor
                    'rgba(30, 144, 255, 0.2)', // Blue for Mobil
                ],
                borderColor: [
                    'rgba(255, 0, 0, 1)', // Red for Motor
                    'rgba(30, 144, 255, 1)', // Blue for Mobil
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>
@endsection