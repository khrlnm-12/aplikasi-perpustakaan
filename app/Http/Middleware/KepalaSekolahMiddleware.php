<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KepalaSekolahMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (
            !session('role') ||
            session('role') != 'kepala_sekolah'
        ) {

            return redirect('/');
        }

        return $next($request);
    }
}