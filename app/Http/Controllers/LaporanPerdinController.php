<?php

namespace App\Http\Controllers;

use App\Models\DataPerdin;
use App\Models\LaporanPerdin;
use App\Models\StatusPerdin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LaporanPerdinController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        return view('dashboard.perdin.laporan-perdin.index', [
            'title' => 'Daftar Laporan Perdin',
            'laporan_perdins' => LaporanPerdin::all(),
        ]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    */
    public function show(LaporanPerdin $laporanPerdin)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(LaporanPerdin $laporanPerdin)
    {
        if (!$laporanPerdin->data_perdin->status->approve) {
            return abort(404);
        }

        return view('dashboard.perdin.laporan-perdin.edit', [
            'title' => 'Perbarui Laporan Perdin',
            'laporan_perdin' => $laporanPerdin,
        ]);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, LaporanPerdin $laporanPerdin)
    {
        if (!$laporanPerdin->data_perdin->status->approve) {
            return abort(404);
        }

        return DB::transaction(function () use ($request, $laporanPerdin) {
            $validatedData = $request->validate([
                'tgl_laporan' => 'required|date',
                'no_spt' => 'required',
                // 'latar_belakang' => 'required',
                'maksud' => 'required',
                'kegiatan' => 'required',
                'hasil' => 'required',
                'kesimpulan' => 'required',
                'file_laporan' => 'mimes:pdf|file|max:10000',
            ]);

            if ($request->file('file_laporan')) {
                if($request->oldLaporan){
                    Storage::delete($request->oldLaporan);
                }
                $validatedData['file_laporan'] = $request->file('file_laporan')->store('file-laporan');
            }

            $validatedData['author_id'] = auth()->user()->id;
            unset($validatedData['no_spt']);

            LaporanPerdin::where('id', $laporanPerdin->id)->update($validatedData);
            StatusPerdin::where('id', $laporanPerdin->data_perdin->status_id)->update(['lap' => 1]);
            DataPerdin::where('laporan_perdin_id', $laporanPerdin->id)->update(['no_spt' => $request->no_spt]);
            return redirect()->back()->with('success', 'Laporan Perdin berhasil disimpan! Silahkan cetak Laporan!');
        }, 2);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(LaporanPerdin $laporanPerdin)
    {
        //
    }
}
