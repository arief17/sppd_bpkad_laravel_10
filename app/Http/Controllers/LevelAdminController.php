<?php

namespace App\Http\Controllers;

use App\Models\LevelAdmin;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class LevelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.level-admin.index', [
            'title' => 'Daftar Level Admin',
            'level_admins' => LevelAdmin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.level-admin.create', [
            'title' => 'Tambah Level Admin',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(LevelAdmin::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        LevelAdmin::create($validatedData);
        return redirect()->route('level-admin.index')->with('success', 'Level Admin berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LevelAdmin $levelAdmin)
    {
        return view('dashboard.master.level-admin.show', [
            'title' => 'Detail Level Admin',
            'level_admin' => $levelAdmin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LevelAdmin $levelAdmin)
    {
        return view('dashboard.master.level-admin.edit', [
            'title' => 'Perbarui Level Admin',
            'level_admin' => $levelAdmin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LevelAdmin $levelAdmin)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(LevelAdmin::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        LevelAdmin::where('id', $levelAdmin->id)->update($validatedData);
        return redirect()->route('level-admin.index')->with('success', 'Level Admin berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LevelAdmin $levelAdmin)
    {
        $levelAdmin->delete();
        return redirect()->route('level-admin.index')->with('success', 'Level Admin berhasil dihapus!');
    }
}
