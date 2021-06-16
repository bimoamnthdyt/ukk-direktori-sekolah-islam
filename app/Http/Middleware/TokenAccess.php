<?php

namespace App\Http\Middleware;

use Closure;

class TokenAccess
{
    
    public function handle($request, Closure $next)
    {
        $token = '4qqaA6knycaBGsRsCD3Yl2xVQUp4HdrCmhCoJIEioi5Z02cRYe';
        if(!$request->header('Authorization')){
            return response()->json(['success' => false, 'status' => 401, 'message' => 'unauthorized'], 401);
        }else{
            if($request->header('Authorization') !== $token){
                return response()->json(['success' => false, 'status' => 401, 'message' => 'unauthorized'], 401);
            }
        }
        return $next($request); 
    }
}


// /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure  $next
    //  * @return mixed
    //  */


 
        