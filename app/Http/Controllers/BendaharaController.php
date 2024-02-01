<?php

namespace App\Http\Controllers;

use App\Models\Bendahara;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.bendahara.index', [
            'title' => 'Daftar Bendahara',
            'bendaharas' => Bendahara::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.bendahara.create', [
            'title' => 'Tambah Bendahara',
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required'
        ]);
        
        $validatedData['author_id'] = auth()->user()->id;
        
        Bendahara::create($validatedData);
        return redirect()->route('bendahara.index')->with('success', 'Bendahara berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bendahara $bendahara)
    {
        return view('dashboard.master.bendahara.show', [
            'title' => 'Detail Bendahara',
            'bendahara' => $bendahara,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bendahara $bendahara)
    {
        return view('dashboard.master.bendahara.edit', [
            'title' => 'Perbarui Bendahara',
            'bendahara' => $bendahara,
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bendahara $bendahara)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required'
        ]);
        
        $validatedData['author_id'] = auth()->user()->id;
        
        Bendahara::where('id', $bendahara->id)->update($validatedData);
        return redirect()->route('bendahara.index')->with('success', 'Bendahara berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bendahara $bendahara)
    {
        $bendahara->delete();
        return redirect()->route('bendahara.index')->with('success', 'Bendahara berhasil dihapus!');
    }
}
