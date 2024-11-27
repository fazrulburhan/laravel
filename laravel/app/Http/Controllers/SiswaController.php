<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));

    }
    

    // Menampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Simpan data siswa ke database
        Siswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke daftar siswa setelah data disimpan
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit siswa
    public function edit($id)
    {
        // Mencari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Menampilkan form edit dengan data siswa
        return view('siswa.edit', compact('siswa'));
    }

    // Method untuk mengupdate data siswa
    public function update(Request $request, $id)
    {
        // Mencari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,' . $siswa->id, // Pastikan email milik siswa yang sama
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Update data siswa
        $siswa->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke daftar siswa setelah data diperbarui
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui!');
    }

    // Method untuk menghapus data siswa
    public function destroy($id)
    {
        // Mencari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Menghapus siswa
        $siswa->delete();

        // Redirect ke daftar siswa setelah data dihapus
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
