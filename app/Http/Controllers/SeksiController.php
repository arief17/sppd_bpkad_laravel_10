<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Seksi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class SeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.seksi.index', [
            'title' => 'Daftar Seksi',
            'seksis' => Seksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.seksi.create', [
            'title' => 'Tambah Seksi',
            'bidangs' => Bidang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'bidang_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Seksi::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Seksi::create($validatedData);
        return redirect()->route('seksi.index')->with('success', 'Seksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seksi $seksi)
    {
        return view('dashboard.master.seksi.show', [
            'title' => 'Detail Seksi',
            'seksi' => $seksi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seksi $seksi)
    {
        return view('dashboard.master.seksi.edit', [
            'title' => 'Perbarui Seksi',
            'seksi' => $seksi,
            'bidangs' => Bidang::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seksi $seksi)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'bidang_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Seksi::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Seksi::where('id', $seksi->id)->update($validatedData);
        return redirect()->route('seksi.index')->with('success', 'Seksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seksi $seksi)
    {
        $seksi->delete();
        return redirect()->route('seksi.index')->with('success', 'Seksi berhasil dihapus!');
    }
}
