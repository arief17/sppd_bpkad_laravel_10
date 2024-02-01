<?php

namespace App\Http\Controllers;

use App\Models\JenisPerdin;
use Illuminate\Http\Request;

class JenisPerdinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.jenis-perdin.index', [
            'title' => 'Daftar Jenis Perdin',
            'jenis_perdins' => JenisPerdin::all(),
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
    public function show(JenisPerdin $jenis_perdin)
    {
        return view('dashboard.master.jenis-perdin.show', [
            'title' => 'Detail Jenis Perdin',
            'jenis_perdin' => $jenis_perdin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPerdin $jenis_perdin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPerdin $jenis_perdin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPerdin $jenis_perdin)
    {
        //
    }
}
