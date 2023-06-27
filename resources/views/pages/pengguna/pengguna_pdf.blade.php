<!DOCTYPE html>
<html>

    <head>
        <title>Laporan Apoteker Apotek Arema</title>
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
            <h2>Laporan Apoteker Apotek Arema</h2>
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
                    @if ($pg->status == 'apoteker')
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pg->nama }}</td>
                            <td>{{ $pg->umur }}</td>
                            <td>{{ $pg->status }}</td>
                            <td>{{ $pg->alamat }}</td>
                            <td>{{ $pg->email }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </body>

</html>
