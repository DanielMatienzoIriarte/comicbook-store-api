<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Http\Responses\ClientErrorResponse;
use App\Http\Responses\ValidResponse;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\Models\Role;
use Exception;

class UserController extends Controller
{
    /**
     * Creates a new User
     * 
     * @param \App\Http\Requests\UserPostRequest $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function Post(UserPostRequest $request) : Responsable {
        try{
            $user = User::create([
                'name' => $request->fullname,
                'email' => $request->email,
                'password' => $request->password,
            ]);
    
            $user->assignRole(
                Role::find(3)
            );

            return new ValidResponse(
                ['message' => 'User successfully created'],
                201,
                [
                    'Location' => '',
                    'Content-Type' => 'application/json',
                ]
            );
        } catch (Exception $exception) {
            return new ClientErrorResponse(
                [
                    'message' => 'Invalid request',
                    'exception' => $exception->getMessage(),
                ]
            );
        }
    }
}
