<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginDto;
use App\Http\Resources\UserResource;
use App\Services\Auth\Actions\CheckAuthAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(
        Request         $request,
        LoginDto        $dto,
        CheckAuthAction $checkAuthAction,
    ): JsonResponse
    {
        if (!$checkAuthAction($dto)) {
            return response()->json([], 401);
        }

        $request->session()->regenerate();

        return response()->json(new UserResource(Auth::user()));
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(null, 204);
    }
}
