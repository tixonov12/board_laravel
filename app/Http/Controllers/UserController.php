<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SetAvatarDto;
use App\Http\Resources\UserResource;
use App\Services\User\Actions\SetAvatarAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me(): JsonResponse
    {
        return response()->json(new UserResource(Auth::user()));
    }

    public function setAvatar(
        SetAvatarDto    $dto,
        SetAvatarAction $setAvatarAction,
    ): JsonResponse
    {
        $path = $setAvatarAction($dto->avatar, Auth::user());

        return response()->json(['avatar' => $path]);
    }
}
