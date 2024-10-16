<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); // Use all() for better readability

        return view('kategori.index', ['kategori' => $kategori]);
    }

    public function tambah()
    {
        return view('kategori.form');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Validation for 'nama'
        ]);

        Kategori::create(['nama' => $request->nama]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); // Handle non-existing ids

        return view('kategori.form', ['kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Validation for 'nama'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update(['nama' => $request->nama]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diubah.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
