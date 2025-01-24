<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kariawan; 
use App\Models\Kehadiran;

class KariawanController extends Controller
{
    /**
     * Tampilkan daftar karyawan beserta total gaji mereka.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data karyawan beserta total gaji mereka
        $data = Kariawan::all(); // Ambil semua data karyawan

        // Kirim data ke view 'kariawan.index'
        return view('kariawan.index', compact('data'));
    }

    /**
     * Tambahkan data karyawan baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'gaji_per_hari' => 'required|numeric|min:0',
        ]);

        // Simpan data karyawan
        Kariawan::create([
            'nama' => $request->nama,
            'gaji_per_hari' => $request->gaji_per_hari,
        ]);

        return redirect()->route('kariawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Catat kehadiran karyawan ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeKehadiran(Request $request)
    {
        // Validasi input
        $request->validate([
            'kariawan_id' => 'required|exists:kariawan,id',
            'tanggal' => 'required|date|unique:kehadiran,tanggal,NULL,id,kariawan_id,' . $request->kariawan_id,
        ]);

        // Simpan data kehadiran
        Kehadiran::create([
            'kariawan_id' => $request->kariawan_id,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->back()->with('success', 'Kehadiran berhasil dicatat.');
    }

    /**
     * Hapus data karyawan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $kariawan = Kariawan::findOrFail($id);

        // Hapus karyawan beserta kehadirannya
        $kariawan->delete();

        return redirect()->route('kariawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
