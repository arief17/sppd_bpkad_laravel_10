<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\UangHarian;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.uang-harian.index', [
            'title' => 'Daftar Uang Harian',
            'uang_harians' => UangHarian::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.uang-harian.create', [
            'title' => 'Tambah Uang Harian',
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

        $validatedData['slug'] = SlugService::createSlug(UangHarian::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangHarian::create($validatedData);
        return redirect()->route('uang-harian.index')->with('success', 'Uang Harian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangHarian $uangHarian)
    {
        return view('dashboard.master.uang-harian.show', [
            'title' => 'Detail Uang Harian',
            'uang_harian' => $uangHarian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangHarian $uangHarian)
    {
        return view('dashboard.master.uang-harian.edit', [
            'title' => 'Perbarui Uang Harian',
            'uang_harian' => $uangHarian,
            'wilayahs' => Wilayah::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangHarian $uangHarian)
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
        
        $validatedData['slug'] = SlugService::createSlug(UangHarian::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangHarian::where('id', $uangHarian->id)->update($validatedData);
        return redirect()->route('uang-harian.index')->with('success', 'Uang Harian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangHarian $uangHarian)
    {
        $uangHarian->delete();
        return redirect()->route('uang-harian.index')->with('success', 'Uang Harian berhasil dihapus!');
    }
}
