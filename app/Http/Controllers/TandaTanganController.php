<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\TandaTangan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TandaTanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.tanda-tangan.index', [
            'title' => 'Daftar Tanda Tangan',
            'tanda_tangans' => TandaTangan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.tanda-tangan.create', [
            'title' => 'Tambah Tanda Tangan',
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required',
            'status' => '',
            'file_ttd' => 'image|max:10000'
        ]);

        if (!$request->status) {
            $validatedData['status'] = 0;
        }
        $pegawai = Pegawai::where('id', $request->pegawai_id)->first();

        if ($request->file('file_ttd')) {
            $validatedData['file_ttd'] = $request->file('file_ttd')->store('file-ttd');
        }
        $validatedData['slug'] = SlugService::createSlug(TandaTangan::class, 'slug', $pegawai->nama . " " . $pegawai->jabatan->nama);
        $validatedData['author_id'] = auth()->user()->id;

        TandaTangan::create($validatedData);
        return redirect()->route('tanda-tangan.index')->with('success', 'Tanda Tangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TandaTangan $tandaTangan)
    {
        return view('dashboard.master.tanda-tangan.show', [
            'title' => 'Detail Tanda Tangan',
            'tanda_tangan' => $tandaTangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TandaTangan $tandaTangan)
    {
        return view('dashboard.master.tanda-tangan.edit', [
            'title' => 'Perbarui Tanda Tangan',
            'tanda_tangan' => $tandaTangan,
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TandaTangan $tandaTangan)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required',
            'status' => '',
            'file_ttd' => 'image|max:10000'
        ]);

        if (!$request->status) {
            $validatedData['status'] = 0;
        }

        if ($request->file('file_ttd')) {
            if($request->oldTtd){
                Storage::delete($request->oldTtd);
            }
            $validatedData['file_ttd'] = $request->file('file_ttd')->store('file-ttd');
        }

        $pegawai = Pegawai::where('id', $request->pegawai_id)->first();

        $validatedData['slug'] = SlugService::createSlug(TandaTangan::class, 'slug', $pegawai->nama . " " . $pegawai->jabatan->nama);
        $validatedData['author_id'] = auth()->user()->id;

        TandaTangan::where('id', $tandaTangan->id)->update($validatedData);
        return redirect()->route('tanda-tangan.index')->with('success', 'Tanda Tangan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TandaTangan $tandaTangan)
    {
        $tandaTangan->delete();
        return redirect()->route('tanda-tangan.index')->with('success', 'Tanda Tangan berhasil dihapus!');
    }
}
