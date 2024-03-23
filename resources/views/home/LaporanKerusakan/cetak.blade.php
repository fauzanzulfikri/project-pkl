<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Kerusakan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            display: none;
        }
        @media print {
            .btn {
                display: none !important;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <h2>Laporan Kerusakan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Komputer</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Pelapor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporankerusakan as $lk)
                <tr>
                    <td>{{ $lk->id }}</td>
                    <td>No. {{ $lk->Komputer->nomor_komputer }} | {{ $lk->Komputer->posisi }}</td>
                    <td>{{ $lk->tanggal }}</td>
                    <td>{{ $lk->deskripsi }}</td>
                    <td>{{ $lk->User->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Hide buttons when printing
        window.onbeforeprint = function() {
            var btns = document.getElementsByClassName('btn');
            for (var i = 0; i < btns.length; i++) {
                btns[i].style.display = 'none';
            }
        };
    </script>
</body>
</html>
