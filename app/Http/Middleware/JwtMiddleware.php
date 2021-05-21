<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Expection;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware{
    /**
     * Handle an incoming request.
     * 
     *@param \Illuminate\Http\Request  $request
     *@param \Closure $next
     *@return mixed
     */
    
    public function handle($request, Closure $next){ // faz a requisação
       // dd($request); 
        try{

            $user = JWTAuth::parseToken()->authenticate(); // faz autenticacao
        }catch (Exception $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['message' => 'Token inválido']);
            }else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['message' => 'Token expirado']);
            }else{
                return response()->json(['message'=>'Token de autorização não encontrado']);
            }
        }
        return $next($request);
    }    
}