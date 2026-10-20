<?php

namespace App\Services\User\Actions;

use App\Models\User;
use Illuminate\Http\UploadedFile;

class SetAvatarAction
{
    public function __invoke(UploadedFile $avatar, User $user): string
    {
        $path = $avatar->store('avatars', 'public');
        $user->update(['avatar' => $path]);

        return $user->avatar_url;
    }
}
