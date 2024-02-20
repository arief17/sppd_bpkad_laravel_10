<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.kabupaten.index', [
            'title' => 'Daftar Kota/Kabupaten',
            'kabupatens' => Kabupaten::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.kabupaten.create', [
            'title' => 'Tambah Kota/Kabupaten',
            'wilayahs' => Wilayah::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'wilayah_id' => 'required',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Kabupaten::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;

        Kabupaten::create($validatedData);
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kabupaten $kabupaten)
    {
        return view('dashboard.master.kabupaten.show', [
            'title' => 'Detail Kabupaten',
            'kabupaten' => $kabupaten,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabupaten $kabupaten)
    {
        return view('dashboard.master.kabupaten.edit', [
            'title' => 'Perbarui Kota/Kabupaten',
            'kabupaten' => $kabupaten,
            'wilayahs' => Wilayah::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'wilayah_id' => 'required',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Kabupaten::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;

        Kabupaten::where('id', $kabupaten->id)->update($validatedData);
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil dihapus!');
    }
}
