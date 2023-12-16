@extends('admin.nav')

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
                                        <h4 class="card-title">Total Kendaraan Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ totalKendaraanParkir }}</p>
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
                        </div>
                    </div>
                </div>
                <!-- Card untuk Parkiran GKT -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Parkiran GKT</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Kendaraan Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ parkiran.gkt.total }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Maksimal Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ parkiran.gkt.kapasitasMax }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-lg-6">
                <!-- Card untuk Parkiran Tata Niaga -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Parkiran Tata Niaga</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Kendaraan Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ parkiran.gkt.total }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Maksimal Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ parkiran.gkt.kapasitasMax }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Card untuk Parkiran Mesin -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Parkiran Mesin</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Kendaraan Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ parkiran.gkt.total }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Maksimal Parkir</h4>
                                        <p class="card-text" style="font-size: 24px; font-weight: bold; color: white;">@{{ parkiran.gkt.kapasitasMax }}</p>
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
            totalMaksimalParkir: 20,
            parkiran: {
                gkt: {
                    total: 10,
                    kapasitasMax: 15
                },
                mesin: {
                    total: 8,
                    kapasitasMax: 10
                },
                tataNiaga: {
                    total: 12,
                    kapasitasMax: 20
                }
            }
        }
    });

    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Red', 'Blue', 'Purple', 'Brown'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 0, 0, 0.2)', // Red
                    'rgba(30, 144, 255, 0.2)', // Blue
                    'rgba(128, 0, 128, 0.2)', // Purple
                    'rgba(165, 42, 42, 0.2)', // Brown
                ],
                borderColor: [
                    'rgba(255, 0, 0, 1)', // Red
                    'rgba(30, 144, 255, 1)', // Blue
                    'rgba(128, 0, 128, 1)', // Purple
                    'rgba(165, 42, 42, 1)', // Brown
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