<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

    
        $nik = session()->get('nik');

        if (!$nik) {
            return redirect()->route('auth.login')->with('error', 'Nik tidak ditemukan di session');
        }

        $profile = Karyawan::with('departement', 'role')->where('nik', $nik)->get();

        if (!$profile) {
            return redirect()->back()->with('error', 'Data Profile tidak ditemukan');
        }

        return view('pages.profile.index', [
            'profile' => $profile
        ]);

    }

    public function editPassword(){
        $nik = session()->get('nik');
        $profile = Karyawan::with('departement', 'role')->where('nik', $nik)->first();
        return view('pages.profile.edit-password', [
            'profile' => $profile
        ]);
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ];

        $request->validate($rules);

        $user = User::where('nik', session()->get('nik'))->first();

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors([
                'current_password' => 'Password saat ini salah',
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah');
        
    }
    
}
