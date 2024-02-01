<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            User::where('id', auth()->user()->id)->update(['last_login' => now()]);

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Gagal Login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function apiLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken($user->username);
            User::where('id', $user->id)->update(['last_login' => now()]);

            return response()->json([
                'token' => $token->plainTextToken,
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'level_admin' => $user->level_admin->nama,
                    'bidang' => $user->bidang->nama ?? '',
                    'nama_jabatan' => $user->jabatan->nama ?? '',
                    'jabatan_id'    => $user->jabatan->id,
                    'last_login' => $user->last_login,
                ]
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function apiLogout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
