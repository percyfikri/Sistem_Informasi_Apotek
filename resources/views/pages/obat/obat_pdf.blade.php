<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Obat Apotek Arema</title>
</head>

<body>
    <style>
        .table-bordered {
            border-collapse: collapse;
            width: 100%;
        }
        
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }
        
        .table .tanggal {
            text-align: left;
            white-space: nowrap;
        }
    </style>
    <center>
        <h2>Laporan Data Obat Apotek Arema</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Jenis Obat</th>
                <th>Stok Obat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $obt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obt->nama_obat }}</td>
                    <td>{{ $obt->jenis_obat }}</td>
                    <td>{{ $obt->stok_obat->sum('kuantitas') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
