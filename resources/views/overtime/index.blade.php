@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pengajuan Lembur</h1>
        <table class="table">
            <thead>
                <tr>
                    @if (auth()->check() && auth()->user()->role === 'manager')
                        <th>Nama Karyawan</th>
                        <th>Pekerjaan</th>
                    @endif
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Durasi</th>
                    <th>Status</th>
                    @if (auth()->check() && auth()->user()->role === 'manager')
                        <th>Aksi</th>
                    @endif
                    <th>Cetak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($overtimes as $overtime)
                    <tr>
                        @if (auth()->check() && auth()->user()->role === 'manager')
                            <td>{{ $overtime->employee->name }}</td>
                            <td>{{ $overtime->employee->occupation }}</td>
                        @endif
                        <td>{{ $overtime->date }}</td>
                        <td>{{ \Carbon\Carbon::parse($overtime->start_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($overtime->end_time)->format('H:i') }}</td>
                        <td>{{ $overtime->hours }} jam</td>
                        <td>{{ $overtime->status }}</td>
                        @if (auth()->check() && auth()->user()->role === 'manager')
                            <td>
                                <div class="d-flex flex-row">
                                    <form action="{{ route('overtime.approve', $overtime->id) }}" method="POST" class="me-2">
                                        @csrf
                                        <button type="submit" name="approved" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('overtime.reject', $overtime->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" name="rejected" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        @endif
                        <td><a href="{{ route('overtime.print', $overtime->id) }}" class="btn btn-primary">Cetak</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection