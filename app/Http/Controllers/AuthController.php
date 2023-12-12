<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }
    public function formUser()
    {
        return view('backend.auth.daftar');
    }
    public function datapengguna()
    {
        $pengguna = DB::table('users')->get();
        $nomor = 1;
        return view('backend.auth.index', compact('pengguna','nomor'));
    }
    public function simpan(Request $request)
    {
        $this->validate($request, [
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required', 'min:8','confirmed']
        ]);
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        };

        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
            'password' => 'Password salah'
        ])->onlyInput('email','password');
    }
}
