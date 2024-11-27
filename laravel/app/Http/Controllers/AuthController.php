<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Menyimpan data registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // Konfirmasi password harus sama
        ]);

        // Simpan data pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Cek kredensial login
        if (Auth::attempt($credentials)) {
            // Arahkan ke halaman siswa setelah login berhasil
            return redirect()->route('siswa.index');
        }

        // Jika login gagal, kembali dengan pesan error
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        
        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }
}
