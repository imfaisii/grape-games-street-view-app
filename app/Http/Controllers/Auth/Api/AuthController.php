<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Api\LoginRequest;
use App\Models\User;
use App\Traits\Jsonify;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use Jsonify;

    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        return self::success(data: ['token' => $this->getToken($request->user())]);
    }

    public function getToken(User $user): string
    {
        $token = $user->createToken('LOGIN_TOKEN');

        return "Bearer {$token->plainTextToken}";
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return self::success(message: 'Token revoked.');
    }
}
