<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\UserAuthenticationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Responses\ValidResponse;
use App\Http\Responses\ClientErrorResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Authenticate via password, grant and return token if successful
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Responsable
     * @throws \Exception
     */
    public function login(Request $request) : Responsable
    {
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return new ClientErrorResponse(
                [
                    'status' => 'error',
                    'message' => 'Invalid credentials',
                ],
                401
            );
        }

        $user = Auth::user();
        
        return new ValidResponse(
            [
                'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'baerer',
                ],
            ]
        );
    }

    /**
     * Finishes the current user's session.
     * 
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function logout() : Responsable
    {
        Auth::logout();

        return new ValidResponse(
            [
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]
        );
    }

    /**
     * @return Illuminate\Http\JsonResponse
     */
    public function refresh() : JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
