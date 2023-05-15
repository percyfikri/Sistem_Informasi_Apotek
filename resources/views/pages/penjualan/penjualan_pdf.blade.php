<!DOCTYPE html>
<html>

    <head>
        <title>Laporan PDF Penjualan Apotek Arema</title>
    </head>

    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan Penjualan Apotek Arema</h4>
        </center>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Nama Apoteker</th>
                    <th>Nama Jasa</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->customer->nama }}</td>
                        <td>{{ $p->apoteker->nama }}</td>
                        <td>{{ $p->jasa->nama_jasa }}</td>
                        <td>{{ $p->tanggal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
