<?php

namespace App\Http\Controllers\Api\User;

use App\Contracts\AccessTokenContract;
use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\RegisterRequest;
use App\Http\Resources\Api\User\RegisterResource;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(
        RegisterRequest $request,
        AccessTokenContract $accessTokenService,
        UserContract $userService
    ) {
        $user = $userService->create($request->validated());
        $token = $accessTokenService->create($user);

        return new RegisterResource($token);
    }
}
