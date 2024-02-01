<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanSub;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KegiatanSubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.kegiatan-sub.index', [
            'title' => 'Daftar Sub Kegiatan',
            'kegiatan_subs' => KegiatanSub::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.kegiatan-sub.create', [
            'title' => 'Tambah Sub Kegiatan',
            'kegiatans' => Kegiatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'kegiatan_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(KegiatanSub::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        KegiatanSub::create($validatedData);
        return redirect()->route('kegiatan-sub.index')->with('success', 'Sub Kegiatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KegiatanSub $kegiatanSub)
    {
        return view('dashboard.master.kegiatan-sub.show', [
            'title' => 'Detail Sub Kegiatan',
            'kegiatan_sub' => $kegiatanSub,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KegiatanSub $kegiatanSub)
    {
        return view('dashboard.master.kegiatan-sub.edit', [
            'title' => 'Perbarui Sub Kegiatan',
            'kegiatan_sub' => $kegiatanSub,
            'kegiatans' => Kegiatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KegiatanSub $kegiatanSub)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'seksi_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(KegiatanSub::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        KegiatanSub::where('id', $kegiatanSub->id)->update($validatedData);
        return redirect()->route('kegiatan-sub.index')->with('success', 'Sub Kegiatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KegiatanSub $kegiatanSub)
    {
        $kegiatanSub->delete();
        return redirect()->route('kegiatan-sub.index')->with('success', 'Sub Kegiatan berhasil dihapus!');
    }
}
