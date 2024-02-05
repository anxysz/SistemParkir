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
            <div class="col-md-12">
            <div class="card">
    <div class="card-body">
        <form action="{{ route('parkir.update', $parkir->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                            <label for="kode_karcis">Kode Karcis</label>
                            <input type="text" class="form-control" name="kode_karcis" value="{{ $parkir->kode_karcis }}" readonly >   
            </div>
            <div class="mb-3">
                            <label for="nomor_plat">Plat Nomer</label>
                            <input type="text" class="form-control" name="nomor_plat" value="{{ $parkir->nomor_plat }}">   
            </div>
            <div class="mb-3">
                            <label for="jenis">Jenis Kendaraan</label>
                            <input type="text" class="form-control" name="jenis" value="{{ $parkir->jenis }}">   
            </div>
            <div class="mb-3">
                            <label for="waktu_masuk">Waktu Masuk</label>
                            <input type="text" class="form-control" name="waktu_masuk" value="{{ $parkir->waktu_masuk }}" readonly>   
            </div>
            <div class="mb-3">
                            <label for="penjaga">Penjaga</label>
                            <input type="text" class="form-control" name="penjaga" value="{{ $parkir->penjaga }}" readonly>   
            </div>
            <div class="mb-3">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" value="{{ $parkir->lokasi }}" readonly>   
            </div>
            <div class="text-left">
                            <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection