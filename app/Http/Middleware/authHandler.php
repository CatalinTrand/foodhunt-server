<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class authHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(isset($request->key) && isset($request->user_id)){
            $result = DB::select("SELECT * FROM AuthTable WHERE id = '$request->user_id' AND key = '$request->key'");
            if(count($result) > 0)
                return $next($request);
        }
        return null;
    }
}
