<!DOCTYPE html>
<html>

    <head>
        <title>Laporan PDF Data Obat Apotek Arema</title>
    </head>

    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan Data Obat Apotek Arema</h4>
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
