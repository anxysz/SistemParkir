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
                <h1>TAMBAH DATA</h1>
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
<div class="col-lg-12">
    <div class="card align-content-center">
        <div class="card-header">Tambah Data</div>
        <div class="card-body card-block">
            <form action="{{ route('dataparkir.update', $tambah->id_lokasi)}}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                        <input type="text" name="parkiran" placeholder="Lokasi" class="form-control" value="{{$tambah->parkiran}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-database"></i></div>
                        <input type="kapasitas" name="kapasitas" placeholder="Kapasitas" class="form-control" value="{{$tambah->kapasitas}}">
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-success btn-sm" style="float:left;">
                        Tambah
                    </button>
                </div>
                <a href="{{ url('admin/data_parkir/data') }}">                        
                    <button type="cancel" class="btn btn-danger btn-sm" style="float:left; margin-left: 10px;">
                        Batal
                     </button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection