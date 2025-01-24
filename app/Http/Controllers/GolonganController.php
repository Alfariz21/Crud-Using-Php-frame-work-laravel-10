<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golongans = Golongan::all(); // Mengambil semua data golongan
        return view('golongan.index', compact('golongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gol_kode' => 'required|unique:tb_golongan|max:10',
            'gol_nama' => 'required|max:50',
            'harga' => 'required|numeric',
        ]);

        Golongan::create($request->all());

        return redirect()->route('golongan.index')
                         ->with('success', 'Golongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.show', compact('golongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gol_kode' => 'required|max:10|unique:tb_golongan,gol_kode,' . $id . ',gol_id',
            'gol_nama' => 'required|max:50',
            'harga' => 'required|numeric',
        ]);

        $golongan = Golongan::findOrFail($id);
        $golongan->update($request->all());

        return redirect()->route('golongan.index')
                         ->with('success', 'Golongan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();

        return redirect()->route('golongan.index')
                         ->with('success', 'Golongan berhasil dihapus.');
    }
}

