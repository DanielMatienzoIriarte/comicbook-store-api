<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Http\Responses\ClientErrorResponse;
use App\Http\Responses\ValidResponse;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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
    public function post(UserPostRequest $request): Responsable
    {
        try{
            $user = User::create([
                'name' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole(
                Role::find(3)
            );

            return new ValidResponse(
                [
                    'message' => 'User successfully created',
                    'user' => json_encode([
                        'fullname' => $user->name,
                        'email' => $user->email,
                        'password' => $user->password
                    ]),
                ],
                201,
                [
                    'Location' => sprintf('/user/%d', $user->id),
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

    /**
     * Fetches a user by its ID
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function getById(Request $request, string $id): Responsable
    {
        try {
            $user = User::find($id);

            return new ValidResponse(
                [
                    'message' => 'Success',
                    'user' => $user,
                ],
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
