<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
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
        //Comprobar token
        $token = $request->header('Authorization'); 
        $jwtAuth = new \JWTAuth();
        $checkToken = $jwtAuth->checkToken($token);
        
        if($checkToken){
            return $next($request);
        }else{
            $data = array(
                "status" => false,
                "mensaje" => "Credenciales no validadas"
            );
            return response()->json($data, 200);
        }
        
    }
}
