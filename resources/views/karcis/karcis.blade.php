@extends('main')
@section('bootstrap')

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-hbhGm5j0+4ee2C0JbXKCKFgvHECHTe4UhpqYJxxK+xABPFkKnQZbW+wRXP8d+2GJB6fPzUWVHMvl3vZqRk5q+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{asset ('style/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset ('style/vendors/datatables.net/css/jquery.dataTables.min.css')}}">
<script src="{{asset ('style/vendors/jquery/dist/jquery-3.6.4.min.js')}}"></script>
<script type="text/javascript" charset="utf8"
    src="{{asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}">
</script>

@endsection

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>KARCIS</h1>
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
                        <strong class="card-title">DATA KENDARAAN</strong>
                    </div>
                    <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">
                            
                            <thead>
                                <tr>
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
                                    <th>Penjaga
                                    </th>
                                    <th>Lokasi Parkir
                                    </th>
                                    <th>Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($parkirs as $parkir)
                                <tr>
                                    <td>{{$parkir->kode_karcis}}</td>
                                    <td>{{$parkir->nomor_plat}}</td>
                                    <td>{{$parkir->jenis}}</td>
                                    <td>{{ \Carbon\Carbon::parse($parkir->waktu_masuk)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($parkir->waktu_masuk)->format('H:i:s') }}</td>
                                    <td>{{$parkir->penjaga}}</td>
                                    <td>{{$parkir->lokasi}}</td>
                                    <td>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('parkir.destroy', $parkir->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-solid fa-trash"></i>
                                        </button>
                                        </form>
                                    </td>
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
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection
