
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Parkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h4 class="text-center">Laporan Data Parkir</h4>
    <br>
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
</body>
</html>
