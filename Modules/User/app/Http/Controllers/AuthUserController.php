<?php

namespace App\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    /**
     * User Sign-In
     */
    public function signIn(Request $request): JsonResponse
    {
        return response()->json([]);
    }

    /**
     * User Sign-out
     */
    public function signOut(Request $request): JsonResponse
    {
        return response()->json([]);
    }
}
