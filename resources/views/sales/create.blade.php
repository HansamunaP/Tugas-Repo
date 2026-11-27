@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="card-header">
        <h2><i class="fas fa-plus-circle"></i> Tambah Sales</h2>
    </div>
    
    <div class="form-container">
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Produk</label>
                <select name="produk_id" required>
                    <option value="">Pilih Produk</option>
                    @foreach($produk as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }} - Rp {{ number_format($item->harga, 0, ',', '.') }} (Stok: {{ $item->jumlah }})</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Customer</label>
                <select name="customer_id" required>
                    <option value="">Pilih Customer</option>
                    @foreach($customer as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->email }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" placeholder="Masukkan jumlah" required min="1">
            </div>
            
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required> <!-- ← name nya 'tanggal' -->
            </div>
            
            <button type="submit">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('sales.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection