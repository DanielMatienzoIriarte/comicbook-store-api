<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function Post(UserPostRequest $request) : Response {
        $user = User::create([
            'fullname' => $request->fullName,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return new Response();
    }
}
