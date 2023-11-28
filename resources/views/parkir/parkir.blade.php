@extends('main')
@section('bootstrap')

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-hbhGm5j0+4ee2C0JbXKCKFgvHECHTe4UhpqYJxxK+xABPFkKnQZbW+wRXP8d+2GJB6fPzUWVHMvl3vZqRk5q+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{asset ('style/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset ('style/vendors/datatables.net/css/jquery.dataTables.min.css')}}">
<script src="{{asset ('style/vendors/jquery/dist/jquery-3.6.4.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}">
</script>

@endsection

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Parkir Masuk</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">INPUT KENDARAAN MASUK</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <select class="form-control form-control-md" name="jenis_kendaraan" id="jenis_kendaraan">
                                <option value="" selected>-- Pilih Jenis Kendaraan --</option>
                                <option value="mobil">Mobil</option>
                                <option value="motor">Motor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="plat_nomor">Plat Nomor</label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-md" name="plat_nomor1"
                                        placeholder="H">
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-md" name="plat_nomor2"
                                        placeholder="3123">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-md" name="plat_nomor3"
                                        placeholder="SZE">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">DATA KENDARAAN MASUK</strong>
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
                                    <th>Jam Masuk
                                    </th>
                                    <th>Penjaga
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
                                    <td>13.00</td>
                                    <td>Susanto</td>
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
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection
