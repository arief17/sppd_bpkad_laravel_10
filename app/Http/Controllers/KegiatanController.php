<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Seksi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.kegiatan.index', [
            'title' => 'Daftar Kegiatan',
            'kegiatans' => Kegiatan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.kegiatan.create', [
            'title' => 'Tambah Kegiatan',
            'seksis' => Seksi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'seksi_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Kegiatan::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Kegiatan::create($validatedData);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('dashboard.master.kegiatan.show', [
            'title' => 'Detail Kegiatan',
            'kegiatan' => $kegiatan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('dashboard.master.kegiatan.edit', [
            'title' => 'Perbarui Kegiatan',
            'kegiatan' => $kegiatan,
            'seksis' => Seksi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'seksi_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Kegiatan::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Kegiatan::where('id', $kegiatan->id)->update($validatedData);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
