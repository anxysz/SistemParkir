<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Karcis</title>
    <style>
        /* Add custom CSS styles here */
        .not-bold {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <h2 align="center" class="not-bold">---------- KARCIS ----------</h2>
        <br>
        <h1 align="center">{{ $parkir->kode_karcis }}</h1>
        <br>
        <h4 align="center">{{ $parkir->nomor_plat }}</h4>
        <h5 align="center" class="not-bold">{{ $parkir->jenis }}</h5>
        <h5 align="center" class="not-bold">{{ \Carbon\Carbon::parse($parkir->waktu_masuk)->format('d-m-Y | H:i:s') }}</h5>
        <p align="center" class="not-bold">--------------</p>
        <h6 align="center" class="not-bold">{{ $parkir->penjaga }} - {{ $parkir->lokasi }}</h6>
    </div>
</body>
</html>