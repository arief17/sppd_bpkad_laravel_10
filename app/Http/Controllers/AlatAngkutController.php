<?php

namespace App\Http\Controllers;

use App\Models\AlatAngkut;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AlatAngkutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.alat-angkut.index', [
            'title' => 'Daftar Alat Angkut',
            'alat_angkuts' => AlatAngkut::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tikets = ['Menggunakan tiket' => 1, 'Tidak menggunakan tiket' => 0];

        return view('dashboard.master.alat-angkut.create', [
            'title' => 'Tambah Alat Angkut',
            'tikets' => $tikets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'tiket' => 'required'
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(AlatAngkut::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        AlatAngkut::create($validatedData);
        return redirect()->route('alat-angkut.index')->with('success', 'Alat Angkut berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlatAngkut $alatAngkut)
    {
        return view('dashboard.master.alat-angkut.show', [
            'title' => 'Detail Alat Angkut',
            'alat_angkut' => $alatAngkut,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlatAngkut $alatAngkut)
    {
        $tikets = ['Menggunakan tiket' => 1, 'Tidak menggunakan tiket' => 0];

        return view('dashboard.master.alat-angkut.edit', [
            'title' => 'Perbarui Alat Angkut',
            'alat_angkut' => $alatAngkut,
            'tikets' => $tikets
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlatAngkut $alatAngkut)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'tiket' => 'required'
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(AlatAngkut::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        AlatAngkut::where('id', $alatAngkut->id)->update($validatedData);
        return redirect()->route('alat-angkut.index')->with('success', 'Alat Angkut berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlatAngkut $alatAngkut)
    {
        $alatAngkut->delete();
        return redirect()->route('alat-angkut.index')->with('success', 'Alat Angkut berhasil dihapus!');
    }
}
