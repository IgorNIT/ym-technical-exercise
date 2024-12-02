<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class PasswordResetController extends Controller
{
    /**
     * Send password reset link
     * @param Request $request
     * @return JsonResponse
     */
    public function sendLink(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $status = Password::sendResetLink($data);
        $statusCode = ($status === Password::RESET_LINK_SENT) ? 200 : 500;

        return response()->json(['message' => __($status)], $statusCode);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        /**
         * TODO: Implement password reset
         */
        return response()->json(['message' => '']);
    }
}
