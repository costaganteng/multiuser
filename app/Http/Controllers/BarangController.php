<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all(); // Use all() for better readability

        return view('barang.index', ['data' => $barang]);
    }

    public function tambah()
    {
        $kategori = Kategori::all(); // Use all() for better readability

        return view('barang.form', ['kategori' => $kategori]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id', // Ensure the category exists
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $data = $request->only(['kode_barang', 'nama_barang', 'id_kategori', 'harga', 'jumlah']);
        
        Barang::create($data);

        return redirect()->route('barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Use findOrFail to handle non-existing ids
        $kategori = Kategori::all(); // Use all() for better readability

        return view('barang.form', ['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id', // Ensure the category exists
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $data = $request->only(['kode_barang', 'nama_barang', 'id_kategori', 'harga', 'jumlah']);
        
        $barang = Barang::findOrFail($id);
        $barang->update($data);

        return redirect()->route('barang')->with('success', 'Barang berhasil diubah.');
    }

    public function hapus($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang')->with('success', 'Barang berhasil dihapus.');
    }
}
