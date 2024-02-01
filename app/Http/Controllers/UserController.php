<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\LevelAdmin;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function getUser(Request $request, User $user)
    {
        return response()->json($user, 200);
    }

    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        return view('dashboard.master.user.index', [
            'title' => 'Daftar User',
            'users' => User::all(),
        ]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('dashboard.master.user.create', [
            'title' => 'Tambah User',
            'level_admins' => LevelAdmin::all(),
            'bidangs' => Bidang::all(),
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|alpha_dash|min:3|max:100|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()],
            'level_admin_id' => 'required',
            'bidang_id' => 'required',
            'jabatan_id' => 'required',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
    * Display the specified resource.
    */
    public function show(User $user)
    {
        return view('dashboard.master.user.show', [
            'title' => 'Detail User',
            'user' => $user,
        ]);
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(User $user)
    {
        return view('dashboard.master.user.edit', [
            'title' => 'Perbarui User',
            'user' => $user,
            'level_admins' => LevelAdmin::all(),
            'bidangs' => Bidang::all(),
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, User $user)
    {
        if(auth()->user()->username === $request->username) {
            return redirect()->route('user.index')->with('success', 'Tidak dapat memperbarui data milik pribadi');
        }

        $rules = [
            'password' => ['nullable', 'confirmed', Password::min(5)->letters()],
            'level_admin_id' => 'required',
            'bidang_id' => 'required',
            'jabatan_id' => 'required',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'alpha_dash|min:3|max:100|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        User::where('id', $user->id)->update($validatedData);
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
