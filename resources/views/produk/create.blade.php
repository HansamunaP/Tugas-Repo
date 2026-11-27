@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="card-header">
        <h2><i class="fas fa-plus-circle"></i> Tambah Produk</h2>
    </div>
    
    <div class="form-container">
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" placeholder="Masukkan nama produk" required>
            </div>
            
            <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="number" name="jumlah" placeholder="Masukkan jumlah stok" required>
            </div>
            
            <div class="form-group">
                <label>Jenis / Kategori</label>
                <input type="text" name="jenis" placeholder="Masukkan jenis produk" required>
            </div>
            
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" placeholder="Masukkan harga produk" required>
            </div>
            
            <button type="submit">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('produk.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection