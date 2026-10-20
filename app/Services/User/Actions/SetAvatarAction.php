<?php

namespace App\Services\User\Actions;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SetAvatarAction
{
    public function __invoke(UploadedFile $avatar, User $user): string
    {
        if (Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $avatar->store('avatars', 'public');
        $user->update(['avatar' => $path]);

        return $user->avatar_url;
    }
}
