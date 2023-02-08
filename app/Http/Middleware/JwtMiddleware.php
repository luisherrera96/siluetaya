<?php

namespace App\Http\Middleware;
use App\JWTAuth;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use http\Exception;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        }catch (TokenExpiredException $e) {
            return response()->json(['message' => 'token_expired'], 401);  
        } catch (TokenInvalidException $e) {
            return response()->json(['message' => 'token_invalid'], 401);
        } catch (JWTException $e) {
            return response()->json(['message' => 'token_absent'], 401);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return $next($request);
    }
}