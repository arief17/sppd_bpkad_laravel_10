<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class TtdVisumController extends Controller
{
    public function create()
    {
        return view('dashboard.perdin.ttd-visum.index', [
            'title' => 'Isi Tanda Tangan Visum 2',
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('ttd-visum-pdf', [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
        ]);
    }
}
