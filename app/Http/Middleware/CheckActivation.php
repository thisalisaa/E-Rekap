<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActivation
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->email_verified_at === null) {
            return redirect()->route('admin.activation.form');
        }

        return $next($request);
    }
}
