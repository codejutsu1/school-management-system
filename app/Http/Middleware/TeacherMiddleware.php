<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
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
        $complete = Teacher::where('user_id', Auth::user()->id)->value('complete');

        if(Auth::check() && Auth::user()->hasRole('teacher') && !$complete){
            return $next($request);
        }
        
        return abort('403');
    }
}
