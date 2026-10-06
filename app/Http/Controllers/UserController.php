<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me(): JsonResponse
    {
        return response()->json(new UserResource(Auth::user()));
    }
}
