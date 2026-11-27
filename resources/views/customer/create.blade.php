@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Tambah Customer</h2>
    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telepon" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" rows="3" required></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('customer.index') }}" class="btn-back">Kembali</a>
</div>
@endsection