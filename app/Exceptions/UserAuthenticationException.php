<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * User authentication exception
 */
class UserAuthenticationException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render(Request $request) : JsonResponse
    {
        $response = [
            'status' => 'error',
            'error_description' => 'invalid request',
            'errors' => [
                'key'       => 'authentication',
                'message'   =>'Sorry, your email address or password are incorrect. Please try again',
            ],
            'detail' => 'Sorry, your email address or password are incorrect. Please try again.',
        ];

        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
}
