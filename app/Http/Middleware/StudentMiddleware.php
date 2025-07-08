<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

    class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Debugging line to check if the guard is correctly recognizing the student
        if (Auth::guard('student')->check()) {
            // Log the authenticated student to check details
            return $next($request);
        }

        // If the student is not authenticated
        return redirect()->route('home')->with('error', 'Access Denied');
    }
}

