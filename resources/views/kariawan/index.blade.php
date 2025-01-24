@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Daftar Gaji Karyawan</h1>

    <!-- Form Tambah Karyawan -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Karyawan</div>
        <div class="card-body">
            <form method="POST" action="{{ route('karyawan.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="gaji_per_hari" class="form-label">Gaji per Hari</label>
                    <input type="number" class="form-control" id="gaji_per_hari" name="gaji_per_hari" required>
                </div>
                <button type="submit" class="btn btn-success">Tambah Karyawan</button>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Gaji -->
    <div class="card">
        <div class="card-header bg-success text-white">Daftar Gaji Karyawan</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Gaji per Hari</th>
                        <th>Jumlah Kehadiran</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $karyawan)
                        <tr>
                            <td>{{ $karyawan->nama }}</td>
                            <td>Rp {{ number_format($karyawan->gaji_per_hari, 2, ',', '.') }}</td>
                            <td>Rp {{ number_format($karyawan->total_gaji, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection