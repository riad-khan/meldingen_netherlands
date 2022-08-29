<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\facades\JWTAuth;

class JWT
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
        try{
            JWTAuth::parseToken()->authenticate();
        }catch (\Exception $e){
            if($e instanceof TokenExpiredException){
                $newtoken = JWTAuth::parseToken()->refresh();
                return response()->json(['success'=>false,'token'=>$newtoken,'status'=>'expired'],401);
            }elseif ($e instanceof TokenInvalidException){
                return response()->json(['success'=>false,'message'=>'token Invalid'],401);
            }else{
                return response()->json(['success'=>false,'message'=>'token not found'],401);
            }
        }
        return $next($request);

    }
}
