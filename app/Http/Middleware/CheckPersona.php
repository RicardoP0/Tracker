<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckPersona
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

        $personaId = $request->route('persona')->id;
        if(Auth::user()->persona->id == $personaId){
            return $next($request);
        }
        abort('401');

    }
}
