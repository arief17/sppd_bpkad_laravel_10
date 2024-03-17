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
        $jenis_ttds = [
            'pemberi_perintah' => 'Pejabat Pemberi Perintah',
            'pptk' => 'Petugas Pelaksana Teknis Kegiatan',
            'pengguna_anggaran' => 'Pengguna Anggaran',
            'kuasa_pengguna_anggaran' => 'Kuasa Pengguna Anggaran',
            'kepala_badan' => 'Kepala Badan'
        ];

        return view('dashboard.master.tanda-tangan.create', [
            'title' => 'Tambah Tanda Tangan',
            'pegawais' => Pegawai::all(),
            'jenis_ttds' => $jenis_ttds,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required',
            'file_ttd' => 'image|max:10000',
            'jenis_ttd'=> 'required',
        ]);

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
        $jenis_ttds = [
            'pemberi_perintah' => 'Pejabat Pemberi Perintah',
            'pptk' => 'Petugas Pelaksana Teknis Kegiatan',
            'pengguna_anggaran' => 'Pengguna Anggaran',
            'kuasa_pengguna_anggaran' => 'Kuasa Pengguna Anggaran',
            'kepala_badan' => 'Kepala Badan'
        ];

        return view('dashboard.master.tanda-tangan.edit', [
            'title' => 'Perbarui Tanda Tangan',
            'tanda_tangan' => $tandaTangan,
            'pegawais' => Pegawai::all(),
            'jenis_ttds' => $jenis_ttds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TandaTangan $tandaTangan)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required',
            'file_ttd' => 'image|max:10000',
            'jenis_ttd'=> 'required',
            'status' => 'required',
        ]);

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
