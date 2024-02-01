<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.jabatan.index', [
            'title' => 'Daftar Jabatan',
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.jabatan.create', [
            'title' => 'Tambah Jabatan',
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
        
        $validatedData['slug'] = SlugService::createSlug(Jabatan::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Jabatan::create($validatedData);
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        return view('dashboard.master.jabatan.show', [
            'title' => 'Detail Jabatan',
            'jabatan' => $jabatan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('dashboard.master.jabatan.edit', [
            'title' => 'Perbarui Jabatan',
            'jabatan' => $jabatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Jabatan::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Jabatan::where('id', $jabatan->id)->update($validatedData);
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
