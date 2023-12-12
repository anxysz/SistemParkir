@extends('admin.nav')

@section('bootstrap')

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-hbhGm5j0+4ee2C0JbXKCKFgvHECHTe4UhpqYJxxK+xABPFkKnQZbW+wRXP8d+2GJB6fPzUWVHMvl3vZqRk5q+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{asset ('style/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset ('style/vendors/datatables.net/css/jquery.dataTables.min.css')}}">
<script src="{{asset ('style/vendors/jquery/dist/jquery-3.6.4.min.js')}}"></script>
<script type="text/javascript" charset="utf8"
    src="{{asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}">
</script>

@endsection

@section('title', 'Data Parkir Elektro')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>DATA PARKIRAN ELEKTRO</h1>
            </div>
        </div>
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-file-text-o"></i></li>
                </ol>
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
                        <strong class="card-title">DATA PARKIRAN</strong>
                        <button class="btn btn-success btn-sm" style="float:right">
                            Export PDF <i class="fa fa-solid fa-print"></i>
                        </button>                        
                        <button class="btn btn-info btn-sm" style="float:right; margin-right: 10px;">
                            Tambah Data <i class="fa fa-plus-circle"></i>
                        </button>                        
                    </div>
                    <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi Parkir</th>
                                    <th>Kapasitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>1</td>
                                    <td>Mesin</td>
                                    <td>50</td>
                                    <td>Masuk</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr> --}}
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