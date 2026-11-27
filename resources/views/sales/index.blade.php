@extends('layouts.app')

@section('content')
<h2>Data Sales</h2>
<a href="{{ route('sales.create') }}" class="btn btn-add">+ Tambah Sales</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Produk</th>
            <th>Customer</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->produk->nama }}</td>
            <td>{{ $item->customer->nama }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>
                <a href="{{ route('sales.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('sales.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection