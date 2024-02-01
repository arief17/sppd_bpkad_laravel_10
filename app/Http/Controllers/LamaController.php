<?php

namespace App\Http\Controllers;

use App\Models\Lama;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.lama.index', [
            'title' => 'Daftar Lama',
            'lamas' => Lama::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.lama.create', [
            'title' => 'Tambah Lama',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lama_hari' => 'required|numeric',
        ]);
        
        $validatedData['author_id'] = auth()->user()->id;
        
        Lama::create($validatedData);
        return redirect()->route('lama.index')->with('success', 'Lama berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lama $lama)
    {
        return view('dashboard.master.lama.show', [
            'title' => 'Detail Lama',
            'lama' => $lama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lama $lama)
    {
        return view('dashboard.master.lama.edit', [
            'title' => 'Perbarui Lama',
            'lama' => $lama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lama $lama)
    {
        $validatedData = $request->validate([
            'lama_hari' => 'required|numeric',
        ]);
        
        $validatedData['author_id'] = auth()->user()->id;
        
        Lama::where('id', $lama->id)->update($validatedData);
        return redirect()->route('lama.index')->with('success', 'Lama berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lama $lama)
    {
        $lama->delete();
        return redirect()->route('lama.index')->with('success', 'Lama berhasil dihapus!');
    }
}
