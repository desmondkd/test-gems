<!DOCTYPE html>
<html>
<head>
    <title>Cetak Pengajuan Lembur</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Pengajuan Lembur</h1>
    <table>
        <tr>
            <th>Nama Karyawan</th>
            <td>{{ $overtime->employee->name }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $overtime->date }}</td>
        </tr>
        <tr>
            <th>Waktu Mulai</th>
            <td>{{\Carbon\Carbon::parse($overtime->start_time)->format('H:i')}}</td>
        </tr>
        <tr>
            <th>Waktu Selesai</th>
            <td>{{ \Carbon\Carbon::parse($overtime->end_time)->format('H:i') }}</td>
        </tr>
        <tr>
            <th>Jam Lembur</th>
            <td>{{ $overtime->hours }} jam</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $overtime->status }}</td>
        </tr>
    </table>
</body>
</html>