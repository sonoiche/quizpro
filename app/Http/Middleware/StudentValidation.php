<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user           = auth()->user();
        $currentRoute   = $request->route()->getName();
        $redirectRoute  = 'accounts.edit';

        if(auth()->check() && $user->role == User::ROLE_STUDENT && !isset($user->section) && !isset($user->student_number) && $currentRoute !== $redirectRoute) {
            return redirect()->to('student/accounts/' . $user->id . '/edit');
        }
        
        return $next($request);
    }
}
