<?php

namespace App\Http\Controllers;

use App\Models\Ketentuan;
use Illuminate\Http\Request;

class KetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.ketentuan.index', [
            'title' => 'Daftar Ketentuan',
            'ketentuans' => Ketentuan::all(),
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
    public function show(Ketentuan $ketentuan)
    {
        return view('dashboard.master.ketentuan.show', [
            'title' => 'Detail Ketentuan',
            'ketentuan' => $ketentuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketentuan $ketentuan)
    {
        return view('dashboard.master.ketentuan.edit', [
            'title' => 'Perbarui Ketentuan',
            'ketentuan' => $ketentuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ketentuan $ketentuan)
    {
        $validatedData = $request->validate([
            'max_perdin' => 'required|numeric',
            'tersedia' => 'required|boolean',
        ]);

        $validatedData['author_id'] = auth()->user()->id;

        Ketentuan::where('id', $ketentuan->id)->update($validatedData);
        return redirect()->route('ketentuan.index')->with('success', 'Ketentuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ketentuan $ketentuan)
    {
        //
    }
}
