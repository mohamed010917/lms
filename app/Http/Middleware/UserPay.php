<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class UserPay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startDate = Carbon::parse(auth()->user()->pay);
        $now = Carbon::now();
        $condtion = $startDate->diffInMonths($now) < 0;
        if($condtion){
            return $next($request);
        }
        return abort(403);
    }
}
