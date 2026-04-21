<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $adminUsername = env('ADMIN_USERNAME');
        $adminPassword = env('ADMIN_PASSWORD');

        if ($request->username === $adminUsername && $request->password === $adminPassword) {
            Session::put('admin_authenticated', true);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('error', 'Credenciais inválidas.');
    }

    public function logout()
    {
        Session::forget('admin_authenticated');
        return redirect()->route('admin.login')->with('success', 'Logout realizado com sucesso.');
    }
}