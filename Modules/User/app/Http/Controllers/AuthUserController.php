<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Services\UserService;

class AuthUserController extends Controller
{
    /**
     * User Sign-In
     * @param Request $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function signIn(Request $request,  UserService $userService): JsonResponse
    {
        $data = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($data)) {
            return response()->json(['message' => __('user.invalid_credentials')], 422);
        }

        $user = $userService->getUserByEmail($data['email']);

        return response()->json([
            'message' => __('user.success_logged_in'),
            'token' => $user->createToken('apiToken')->plainTextToken
        ]);
    }

    /**
     * User Sign-out
     * @return JsonResponse
     */
    public function signOut(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => __('user.success_logged_out')]);
    }
}
