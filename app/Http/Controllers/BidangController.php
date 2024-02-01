<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.bidang.index', [
            'title' => 'Daftar Bidang',
            'bidangs' => Bidang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.bidang.create', [
            'title' => 'Tambah Bidang',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'jenis' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Bidang::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Bidang::create($validatedData);
        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {
        return view('dashboard.master.bidang.show', [
            'title' => 'Detail Bidang',
            'bidang' => $bidang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bidang $bidang)
    {
        return view('dashboard.master.bidang.edit', [
            'title' => 'Perbarui Bidang',
            'bidang' => $bidang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bidang $bidang)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'jenis' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Bidang::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Bidang::where('id', $bidang->id)->update($validatedData);
        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang)
    {
        $bidang->delete();
        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil dihapus!');
    }
}
