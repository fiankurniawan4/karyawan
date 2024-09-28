<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        $errors = [];
    
        if (!User::where('username', $data['username'])->exists()) {
            $errors['username'] = 'Username tidak ditemukan.';
        } else {
            if (!auth()->validate(['username' => $data['username'], 'password' => $data['password']])) {
                $errors['password'] = 'Password salah.';
            }
        }
        return back()->withErrors($errors);
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }
}
