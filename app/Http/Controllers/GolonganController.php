<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.golongan.index', [
            'title' => 'Daftar Golongan',
            'golongans' => Golongan::all(),
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
    public function show(Golongan $golongan)
    {
        return view('dashboard.master.golongan.show', [
            'title' => 'Detail Golongan',
            'golongan' => $golongan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Golongan $golongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Golongan $golongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Golongan $golongan)
    {
        //
    }
}
