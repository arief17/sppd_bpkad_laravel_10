<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.pangkat.index', [
            'title' => 'Daftar Pangkat',
            'pangkats' => Pangkat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.pangkat.create', [
            'title' => 'Tambah Pangkat',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Pangkat::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Pangkat::create($validatedData);
        return redirect()->route('pangkat.index')->with('success', 'Pangkat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pangkat $pangkat)
    {
        return view('dashboard.master.pangkat.show', [
            'title' => 'Detail Pangkat',
            'pangkat' => $pangkat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pangkat $pangkat)
    {
        return view('dashboard.master.pangkat.edit', [
            'title' => 'Perbarui Pangkat',
            'pangkat' => $pangkat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pangkat $pangkat)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Pangkat::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Pangkat::where('id', $pangkat->id)->update($validatedData);
        return redirect()->route('pangkat.index')->with('success', 'Pangkat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pangkat $pangkat)
    {
        $pangkat->delete();
        return redirect()->route('pangkat.index')->with('success', 'Pangkat berhasil dihapus!');
    }
}
