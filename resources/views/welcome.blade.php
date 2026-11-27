@extends('layouts.app')

@section('content')
<div class="welcome-section">
    <h1>Selamat Datang</h1>
    <p>Sistem manajemen penjualan terintegrasi untuk mengelola produk, transaksi, dan customer Anda dengan mudah.</p>
</div>
<div class="table-card">
    <div class="card-header">
        <h2><i class="fas fa-fire"></i> Produk Terbaru</h2>
        <a href="{{ route('produk.index') }}" class="btn-add">
            <i class="fas fa-plus"></i> Kelola Produk
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @forelse($latestProduk ?? [] as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jumlah }} pcs</td>
                <td>{{ $item->jenis }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; padding: 40px;">
                    <i class="fas fa-inbox" style="font-size: 40px; color: #dfe6e9; margin-bottom: 10px; display: block;"></i>
                    Belum ada produk
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection