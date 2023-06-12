<!DOCTYPE html>
<html>

    <head>
        <title>Laporan PDF Penjualan Apotek Arema</title>
    </head>

    <body>
        {{-- <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style> --}}
        <style>
            .table-bordered {
              /* border: 1px solid #000000; */
              border-collapse: collapse;
            }

            .table-bordered th,
            .table-bordered td {
              border: 1px solid #000000;
              text-align: center;
              padding: 8px; /* Atur jarak pada teks dalam tabel */
            }

            .table .tanggal {
              text-align: left; /* Mengatur teks di sebelah kiri untuk kolom tanggal */
              white-space: nowrap; /* Mencegah pemutaran teks ke bawah (terlalu panjang) */
            }
        </style>
        <center>
            <h2>Laporan Penjualan Apotek Arema</h2>
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
