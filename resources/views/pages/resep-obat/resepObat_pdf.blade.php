<!DOCTYPE html>
<html>

    <head>
        <title>Laporan PDF Resep Obat Apotek Arema</title>
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
                    <th>Tanggal</th>
                    <th>Nama Resep</th>
                    <th>Customer</th>
                    <th>Dokter</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resepObat as $ro)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ro->tanggal }}</td>
                        <td>{{ $ro->nama_resep }}</td>
                        <td>{{ $ro->customer->nama }}</td>
                        <td>{{ $ro->dokter->nama }}</td>
                        <td>{{ $ro->status }}</td>
                        {{-- <td>{{ $ro->tanggal }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
