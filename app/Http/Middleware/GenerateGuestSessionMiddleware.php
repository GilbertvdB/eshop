<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Darryldecode\Cart\Cart;

class GenerateGuestSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasCookie('guest_session')) {
            // Generate a session key for the guest
            $sessionController = new SessionController();
            $response = $sessionController->generateSessionKey($request);
            return $response;
        }

        return $next($request);
    }
}