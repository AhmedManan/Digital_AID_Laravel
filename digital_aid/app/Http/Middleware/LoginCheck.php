<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($req, Closure $next)
    {
        if($req->session()->get('sessionusertype')=="admin"){

            return $next($req);
        }
       else if($req->session()->get('sessionusertype')=="distributor"){

            return $next($req);
        }
       else if($req->session()->get('sessionusertype')=="consumer"){

            return $next($req);
        }
        else{
            return redirect('/');
        }
        
    }
}
