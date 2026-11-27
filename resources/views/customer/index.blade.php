@extends('layouts.app')

@section('content')
<h2>Data Customer</h2>
<a href="{{ route('customer.create') }}" class="btn btn-add">+ Tambah Customer</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customer as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telepon }}</td>
            <td>{{ $item->alamat }}</td>
            <td>
                <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('customer.destroy', $item->id) }}" method="POST" style="display:inline;">
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