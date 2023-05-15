<!DOCTYPE html>
<html>

    <head>
        <title>Laporan PDF Pengguna Apotek Arema</title>
    </head>

    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan Pengguna Apotek Arema</h4>
        </center>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $pg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pg->nama }}</td>
                        <td>{{ $pg->umur }}</td>
                        <td>{{ $pg->status }}</td>
                        <td>{{ $pg->alamat }}</td>
                        <td>{{ $pg->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
