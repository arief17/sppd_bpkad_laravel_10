<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\UangPenginapan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangPenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.uang-penginapan.index', [
            'title' => 'Daftar Uang Penginapan',
            'uang_penginapans' => UangPenginapan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.uang-penginapan.create', [
            'title' => 'Tambah Uang Penginapan',
            'wilayahs' => Wilayah::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'wilayah_id' => 'required',
            'eselon_i' => 'required|numeric',
            'eselon_ii' => 'required|numeric',
            'eselon_iii' => 'required|numeric',
            'eselon_iv' => 'required|numeric',
            'golongan_iv' => 'required|numeric',
            'golongan_iii' => 'required|numeric',
            'golongan_ii' => 'required|numeric',
            'golongan_i' => 'required|numeric',
            'non_asn' => 'required|numeric',
        ]);

        $validatedData['slug'] = SlugService::createSlug(UangPenginapan::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangPenginapan::create($validatedData);
        return redirect()->route('uang-penginapan.index')->with('success', 'Uang Penginapan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangPenginapan $uangPenginapan)
    {
        return view('dashboard.master.uang-penginapan.show', [
            'title' => 'Detail Uang Penginapan',
            'uang_penginapan' => $uangPenginapan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangPenginapan $uangPenginapan)
    {
        return view('dashboard.master.uang-penginapan.edit', [
            'title' => 'Perbarui Uang Penginapan',
            'uang_penginapan' => $uangPenginapan,
            'wilayahs' => Wilayah::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangPenginapan $uangPenginapan)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'wilayah_id' => 'required',
            'eselon_i' => 'required|numeric',
            'eselon_ii' => 'required|numeric',
            'eselon_iii' => 'required|numeric',
            'eselon_iv' => 'required|numeric',
            'golongan_iv' => 'required|numeric',
            'golongan_iii' => 'required|numeric',
            'golongan_ii' => 'required|numeric',
            'golongan_i' => 'required|numeric',
            'non_asn' => 'required|numeric',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(UangPenginapan::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangPenginapan::where('id', $uangPenginapan->id)->update($validatedData);
        return redirect()->route('uang-penginapan.index')->with('success', 'Uang Penginapan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangPenginapan $uangPenginapan)
    {
        $uangPenginapan->delete();
        return redirect()->route('uang-penginapan.index')->with('success', 'Uang Penginapan berhasil dihapus!');
    }
}
