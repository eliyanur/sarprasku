<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: sans-serif; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:5px; }
    </style>
</head>
<body>

<h2>Laporan Peminjaman</h2>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alat</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->alat->nama_alat }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
