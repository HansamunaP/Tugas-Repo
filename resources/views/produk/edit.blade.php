@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Edit Produk</h2>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $produk->nama }}" required>
        </div>
        <div class="form-group">
            <label>Jumlah:</label>
            <input type="number" name="jumlah" value="{{ $produk->jumlah }}" required>
        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <input type="text" name="jenis" value="{{ $produk->jenis }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('produk.index') }}" class="btn-back">Kembali</a>
</div>
@endsection