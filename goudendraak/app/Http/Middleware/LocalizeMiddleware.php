<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $locale = Session::get("locale") ?? 'en';
            Session::put('locale', $locale);
            App::setLocale($locale);

            return $next($request);
        } catch (Exception $e) {
            \Log::error('Fout in de LocalizeMiddleware: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }
}
