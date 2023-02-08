<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //
        public function authenticate(Request $request)
    {
        $credentials = $request->only('us_email', 'us_password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) 
            {
                return response()->json(['message' => 'invalid_credentials'], 400);
            }
        } 
        catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'us_email' =>      'required|string|email|max:255|unique:users',  
            'us_phone' =>       'required|string|max:255',
            'us_associ_number' =>       'required|string|max:255',
            'us_password' =>   'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors()->toJson(),201);
        }
        $user = User::create
        ([
            'us_email'=>$request->get('us_email'),
            'us_phone'=>$request->get('us_phone'),
            'us_associ_number'=>$request->get('us_associ_number'),
            'us_password'=>Hash::make($request->get('us_password')),
        ]);
        $token =JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
    {
        try 
        {
            if (!$user = JWTAuth::parseToken()->authenticate()) 
            {
                return response()->json(['message' => 'user_not_found'], 404);
            }
        } 
        catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['message' => 'token_expired'], $e->getStatusCode());
        } 
        catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'token_invalid'], $e->getStatusCode());
        } 
        catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
}
