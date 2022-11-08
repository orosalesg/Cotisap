<?php

namespace App\Http\Middleware;

use App\Models\Rol;
use Closure;
use Session;

class rolMiddleware
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
        $rol = auth()->user()->U_admin;

        if(empty($rol)){
            $rol = 'V';
        }

        $role = Rol::where('rol', $rol)->get();
        $JSON = $role[0]->dataConfig;


        \View::share('rolUserConfig', json_decode($JSON, true, 512)  );

        return $next($request);
    }
}
