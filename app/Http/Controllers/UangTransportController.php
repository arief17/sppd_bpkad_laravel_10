<?php

namespace App\Http\Controllers;

use App\Models\AlatAngkut;
use App\Models\Wilayah;
use App\Models\UangTransport;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.uang-transport.index', [
            'title' => 'Daftar Uang Transport',
            'uang_transports' => UangTransport::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.uang-transport.create', [
            'title' => 'Tambah Uang Transport',
            'wilayahs' => Wilayah::all(),
            'alat_angkuts' => AlatAngkut::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alat_angkut_id' => 'required',
            'wilayah_id' => 'required',
            'harga_tiket' => 'nullable|numeric',
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

        $validatedData['harga_tiket'] = $request->harga_tiket ?? 0;
        
        $wilayah = Wilayah::where('id', $request->wilayah_id)->get('nama');
        $alat_angkut = AlatAngkut::where('id', $request->alat_angkut_id)->get('nama');

        $validatedData['slug'] = SlugService::createSlug(UangTransport::class, 'slug', "$wilayah $alat_angkut");
        $validatedData['author_id'] = auth()->user()->id;
        
        UangTransport::create($validatedData);
        return redirect()->route('uang-transport.index')->with('success', 'Uang Transport berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangTransport $uangTransport)
    {
        return view('dashboard.master.uang-transport.show', [
            'title' => 'Detail Uang Transport',
            'uang_transport' => $uangTransport,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangTransport $uangTransport)
    {
        return view('dashboard.master.uang-transport.edit', [
            'title' => 'Perbarui Uang Transport',
            'uang_transport' => $uangTransport,
            'wilayahs' => Wilayah::all(),
            'alat_angkuts' => AlatAngkut::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangTransport $uangTransport)
    {
        $validatedData = $request->validate([
            'alat_angkut_id' => 'required',
            'wilayah_id' => 'required',
            'harga_tiket' => 'nullable|numeric',
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

        $validatedData['harga_tiket'] = $request->harga_tiket ?? 0;
        
        $wilayah = Wilayah::where('id', $request->wilayah_id)->get('nama');
        $alat_angkut = AlatAngkut::where('id', $request->alat_angkut_id)->get('nama');

        $validatedData['slug'] = SlugService::createSlug(UangTransport::class, 'slug', "$wilayah $alat_angkut");
        $validatedData['author_id'] = auth()->user()->id;
        
        UangTransport::where('id', $uangTransport->id)->update($validatedData);
        return redirect()->route('uang-transport.index')->with('success', 'Uang Transport berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangTransport $uangTransport)
    {
        $uangTransport->delete();
        return redirect()->route('uang-transport.index')->with('success', 'Uang Transport berhasil dihapus!');
    }
}
