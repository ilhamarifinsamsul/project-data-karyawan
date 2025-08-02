<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Departement::all();
        return view('pages.departement.index', [
            'departement' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $request->validate($rules);

        Departement::create([
            'name' => $request->name
        ]);

        return redirect()->route('departement.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Departement::findOrFail($id);
        return view('pages.departement.edit', [
            'departement' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Departement::findOrFail($id);

        $rules = [
            'name' => 'required',
        ];

        $request->validate($rules);

        $data->update([
            'name' => $request->name
        ]);

        return redirect()->route('departement.index')->with('success', 'Data Berhasil Diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Departement::findOrFail($id);

        $data->delete();
        return redirect()->route('departement.index')->with('deleted', 'Data Berhasil Dihapus');
    }
}
