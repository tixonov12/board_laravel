<?php

namespace App\Services\Auth\Actions;

use App\Http\Requests\Auth\LoginDto;
use Illuminate\Support\Facades\Auth;

class CheckAuthAction
{
    public function __invoke(LoginDto $dto): bool
    {
        return Auth::guard('web')->attempt($dto->toArray());
    }
}
