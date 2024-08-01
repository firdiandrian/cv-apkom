<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Menampilkan formulir login
    public function showLoginForm()
    {
        return view('admins.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Login sukses, redirect ke halaman yang diinginkan
            return redirect()->intended('admin.dashboard');
        }

        // Login gagal, kembali ke halaman login dengan pesan kesalahan
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}