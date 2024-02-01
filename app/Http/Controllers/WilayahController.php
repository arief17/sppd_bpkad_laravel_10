<?php

namespace App\Http\Controllers;

use App\Models\JenisPerdin;
use App\Models\Wilayah;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.wilayah.index', [
            'title' => 'Daftar Wilayah',
            'wilayahs' => Wilayah::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.wilayah.create', [
            'title' => 'Tambah Wilayah',
            'jenis_perdins' => JenisPerdin::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'jenis_perdin_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Wilayah::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Wilayah::create($validatedData);
        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilayah $wilayah)
    {
        return view('dashboard.master.wilayah.show', [
            'title' => 'Detail Wilayah',
            'wilayah' => $wilayah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        return view('dashboard.master.wilayah.edit', [
            'title' => 'Perbarui Wilayah',
            'wilayah' => $wilayah,
            'jenis_perdins' => JenisPerdin::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'jenis_perdin_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Wilayah::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Wilayah::where('id', $wilayah->id)->update($validatedData);
        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil dihapus!');
    }
}
