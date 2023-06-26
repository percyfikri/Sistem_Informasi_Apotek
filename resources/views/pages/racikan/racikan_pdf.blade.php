<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Racikan Apotek Arema</title>
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
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
            /* Atur jarak pada teks dalam tabel */
        }

        .table .tanggal {
            text-align: left;
            /* Mengatur teks di sebelah kiri untuk kolom tanggal */
            white-space: nowrap;
            /* Mencegah pemutaran teks ke bawah (terlalu panjang) */
        }
    </style>
    <center>
        <h2>Laporan Racikan Apotek Arema</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Racikan</th>
                <th>Harga</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($racikan as $racikan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $racikan->nama_racikan }}</td>
                    <td>{{ $racikan->harga }}</td>
                    <td>{{ $racikan->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
