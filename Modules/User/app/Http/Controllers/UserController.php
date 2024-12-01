<?php

namespace App\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     *  Create User
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([]);
    }
}
