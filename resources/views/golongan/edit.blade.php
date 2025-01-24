@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Golongan</h3>
    <form action="{{ route('golongan.update', $golongan->gol_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="gol_kode" class="form-label">Kode Golongan</label>
            <input type="text" class="form-control" id="gol_kode" name="gol_kode" value="{{ $golongan->gol_kode }}" required>
        </div>
        <div class="mb-3">
            <label for="gol_kode" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{ $golongan->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="gol_nama" class="form-label">Nama Golongan</label>
            <input type="text" class="form-control" id="gol_nama" name="gol_nama" value="{{ $golongan->gol_nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection