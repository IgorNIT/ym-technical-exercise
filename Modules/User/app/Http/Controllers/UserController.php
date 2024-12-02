<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\RegisterUserRequest;
use Illuminate\Http\JsonResponse;
use Modules\User\Services\UserService;
use Prettus\Validator\Exceptions\ValidatorException;


class UserController extends Controller
{
    /**
     *  Create User
     * @throws ValidatorException
     */
    public function store(RegisterUserRequest $request, UserService $userService): JsonResponse
    {
        $user = $userService->createUser($request->toDTO());

        return response()->json([
            'token'   => $user->createToken('apiToken')->plainTextToken,
            'message' => __('user.created'),
        ]);
    }
}
