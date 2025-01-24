@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Golongan</h3>
    <a href="{{ route('golongan.create') }}" class="btn btn-primary mb-3">Tambah Golongan</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($golongans as $golongan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $golongan->gol_kode }}</td>
                <td>{{ $golongan->gol_nama }}</td>
                <td>{{ $golongan->harga }}</td>
                <td>
                    <a href="{{ route('golongan.edit', $golongan->gol_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('golongan.destroy', $golongan->gol_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
