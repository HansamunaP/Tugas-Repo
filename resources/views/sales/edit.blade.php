@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Edit Sales</h2>
    <form action="{{ route('sales.update', $sales->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Produk:</label>
            <select name="produk_id" required>
                @foreach($produk as $item)
                <option value="{{ $item->id }}" {{ $sales->produk_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Customer:</label>
            <select name="customer_id" required>
                @foreach($customer as $item)
                <option value="{{ $item->id }}" {{ $sales->customer_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah:</label>
            <input type="number" name="jumlah" value="{{ $sales->jumlah }}" required min="1">
        </div>
        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="{{ $sales->tanggal }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('sales.index') }}" class="btn-back">Kembali</a>
</div>
@endsection