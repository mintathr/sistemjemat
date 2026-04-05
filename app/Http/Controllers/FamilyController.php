<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::with('wilayah')
            ->orderBy('nama_keluarga', 'asc')
            ->get();
        return view('families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $validated = $request->validate([
            'kode_keluarga' => 'required|unique:families',
            'nama_keluarga' => 'required',
            'sektor'        => 'nullable',
            // tambahkan validasi kolom lainnya sesuai kebutuhan
        ]);

        Family::create($validated);

        return redirect()->route('families.index')->with('success', 'Keluarga berhasil ditambahkan!'); */   
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        // Eager load anggota keluarga agar ringan
        $family->load('members'); 
        return view('families.show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
