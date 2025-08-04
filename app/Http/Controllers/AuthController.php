<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.signin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric',
            'password' => 'required',
        ]);

        // cari user berdasarkan nik
        $user = User::where('nik', $request->nik)->first();

        // jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('auth.login')->with('error', 'NIK tidak ditemukan');
        }

        // jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('auth.login')->with('error', 'Password salah');
        }

        Auth::login($user);

        // simpan ke session
        $request->session()->regenerate();
        $request->session()->put('isLogged', true);
        $request->session()->put('userId', $user->id);
        $request->session()->put('name', $user->name);
        $request->session()->put('nik', $user->nik);
        $request->session()->put('role', $user->roles);

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('auth.login');
    }
}
