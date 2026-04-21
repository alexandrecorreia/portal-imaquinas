<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Log::info('AdminAuth middleware chamado', [
        //     'session_admin_authenticated' => Session::has('admin_authenticated'),
        //     'session_data' => Session::all(),
        // ]);

        if (!Session::has('admin_authenticated')) {
            // Log::warning('Acesso não autorizado, redirecionando para login');
            return redirect()->route('admin.login')->with('error', 'Por favor, faça login para acessar a área de admin.');
        }

        return $next($request);
    }
}