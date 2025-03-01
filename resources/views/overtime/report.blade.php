@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Rekapan Lembur</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Jam Lembur</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($overtimes as $overtime)
            <tr>
                <td>{{ $overtime->employee->name }}</td>
                <td>{{ $overtime->date }}</td>
                <td>{{ $overtime->hours }} jam</td>
                <td>{{ $overtime->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection