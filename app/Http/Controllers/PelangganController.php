<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Golongan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::with(['golongan'])->get();
        return view('pelanggan.index', compact('pelanggans'));
    }

    // Menampilkan form untuk menambah pelanggan
    public function create()
    {
        $golongans = Golongan::all();
        return view('pelanggan.create', compact('golongans'));
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'pel_id_gol' => 'required|exists:tb_golongan,gol_id',
            'pel_no' => 'required|unique:tb_pelanggan,pel_no',
            'pel_nama' => 'required|string|max:50',
            'pel_alamat' => 'required|string',
            'pel_hp' => 'nullable|string|max:20',
            'pel_seri' => 'required|string|max:50',
            'pel_aktif' => 'required|in:Y,N'
        ]);

        // Memasukkan data pelanggan baru
        Pelanggan::create([
            'pel_id_gol' => $request->pel_id_gol,
            'pel_no' => $request->pel_no,
            'pel_nama' => $request->pel_nama,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_seri' => $request->pel_seri,
            'pel_aktif' => $request->pel_aktif,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $golongans = Golongan::all();
        return view('pelanggan.edit', compact('pelanggan', 'golongans'));
    }

    // Memperbarui data pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'pel_id_gol' => 'required|exists:tb_golongan,gol_id',
            'pel_no' => 'required|unique:tb_pelanggan,pel_no,' . $id . ',pel_id',
            'pel_nama' => 'required|string|max:50',
            'pel_alamat' => 'required|string',
            'pel_hp' => 'nullable|string|max:20',
            'pel_seri' => 'required|string|max:50',
            'pel_aktif' => 'required|in:Y,N'
        ]);

        // Cari dan update data pelanggan
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'pel_id_gol' => $request->pel_id_gol,
            'pel_no' => $request->pel_no,
            'pel_nama' => $request->pel_nama,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_seri' => $request->pel_seri,
            'pel_aktif' => $request->pel_aktif,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
