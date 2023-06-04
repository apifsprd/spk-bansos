<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>DAFTAR PENERIMA BANTUAN SOSIAL</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 7px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 style="text-align: center">PEMERINTAH DESA KEMUNING <br> <span style="font-size: 12px">DESA KEMUNING, KECAMATAN KRESEK, KABUPATEN TANGERANG</span></h1>
        </div>

        <hr>

        <div class="row">
            <h3 style="text-align: center;"><u>PENGUMUMAN</u></h3>
            <p style="text-align: center;">Berikut adalah daftar penerima bantuan sosial (Bansos) berdasarkan perhitungan Sistem Penunjang Keputusan (SPK) Desa Kemuning</p>
        </div>

        <div class="row">
            <table width="100%">
                <thead>
                    <tr style="font-size: 12px">
                        <th width='5%'>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th width='10%' >Nilai Rekomendasi</th>
                    </tr>
                </thead>
                <tbody>    
                    @php
                        $i=1
                    @endphp               
                    @foreach ($data as $key => $value)
                    <tr>
                        <td style="text-align: center">{{ $i++ }}</td>
                        <td>{{ $value['nama'] }}</td>
                        <td>{{ $value['nik'] }}</td>
                        <td style="text-align: right">{{ round($value['prefer'], 4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>