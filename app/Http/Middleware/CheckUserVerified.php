<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CheckUserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // Contoh pengecekan data umum user
        if ($user && $user->isVerified()) {
            return $next($request);
        }
        // Redirect atau return response jika user tidak memenuhi syarat
        Alert::warning('Peringatan !!', 'Tunggu Verifikasi dari Admin');
        return \redirect(route('waitingConfirmation'));
    }
}
