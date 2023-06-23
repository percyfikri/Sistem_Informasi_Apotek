<!DOCTYPE html>
<html>

    <head>
        <title>Laporan PDF Resep Obat Apotek Arema</title>
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
                        {{-- <td class="tanggal">{{ $ro->tanggal }}</td> --}}
                        <td class="tanggal">{{ date('d-m-Y', strtotime($ro->tanggal)) }}</td>
                        <td>{{ $ro->nama_resep }}</td>
                        <td>{{ $ro->customer->nama }}</td>
                        <td>{{ $ro->dokter->nama }}</td>
                        <td>{{ $ro->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
