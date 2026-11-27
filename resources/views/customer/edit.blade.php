@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Edit Customer</h2>
    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $customer->nama }}" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telepon" value="{{ $customer->telepon }}" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" rows="3" required>{{ $customer->alamat }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('customer.index') }}" class="btn-back">Kembali</a>
</div>
@endsection