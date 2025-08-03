<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Departement;
use Illuminate\Http\Request;

class KaryawanCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = [];
        
        if (session()->get('role') == 'Super Admin' || session()->get('role') == 'Admin') {
            $karyawan = Karyawan::all();
        }
        
        return view('pages.karyawan.index', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departements = Departement::all();

        return view('pages.karyawan.create', [
            'roles' => $roles,
            'departements' => $departements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required',
            'name' => 'required',
            'departement_id' => 'required|exists:departement,id',
            'shift' => 'required|in:Non-Shift,Shift 1,Shift 2,Shift 3',
            'role_id' => 'required|exists:roles,id',
        ];

        $request->validate($rules);

        Karyawan::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'departement_id' => $request->departement_id,
            'shift' => $request->shift,
            'role_id' => $request->role_id,
        ])->save();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Karyawan::findOrFail($id);
        return view('pages.karyawan.show', [
            'karyawan' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $departements = Departement::all();
        $roles = Role::all();

        return view('pages.karyawan.edit', [
            'karyawan' => $karyawan,
            'departements' => $departements,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nik' => 'required',
            'name' => 'required',
            'departement_id' => 'required|exists:departement,id',
            'shift' => 'required|in:Non-Shift,Shift 1,Shift 2,Shift 3',
            'role_id' => 'required|exists:roles,id',
        ];

        $request->validate($rules);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'departement_id' => $request->departement_id,
            'shift' => $request->shift,
            'role_id' => $request->role_id,
        ]);

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Karyawan::findOrFail($id);
        $data->delete();

        return redirect()->route('karyawan.index')->with('deleted', 'Karyawan berhasil dihapus');
    }
}
