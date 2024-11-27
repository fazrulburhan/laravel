<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        // Logic untuk menampilkan form edit profile
        return view('profile.edit');
    }
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            // Anda bisa menambahkan validasi untuk foto atau kolom lain yang diupdate
        ]);

        // Perbarui profil pengguna
        $user->update($request->only('name', 'email'));

        // Jika ada foto, update foto profil
        if ($request->hasFile('foto')) {
            // Misalnya, simpan foto di folder 'public/profiles'
            $path = $request->file('foto')->store('public/profiles');
            $user->foto = $path;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}



