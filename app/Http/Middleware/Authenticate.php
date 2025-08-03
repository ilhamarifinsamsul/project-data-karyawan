<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        // Cek apakah user sudah login (session ada)
        if (session()->get('isLogged') == null && session()->get('userId') == null) {
            return redirect()->route('auth.login')->with('error', 'Silahkan login terlebih dahulu');
        }

        // Jika middleware diberikan parameter role, cek apakah user memiliki role tersebut
        if ($role != null) {
            $role = explode('|', $role);
            foreach ($role as $r) {
                if (session()->get('role') == $r) {
                    return $next($request);
                }
            }

            return redirect()->route('auth.login')->with('error', 'Anda tidak memiliki akses untuk halaman ini');
        }
        
        return $next($request);
    }
}
