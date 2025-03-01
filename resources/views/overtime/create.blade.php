@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajukan Lembur</h1>
    <form action="{{ route('overtime.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Tanggal Lembur</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_time">Waktu Mulai</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">Waktu Selesai</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan Lembur</button>
    </form>
</div>
@endsection