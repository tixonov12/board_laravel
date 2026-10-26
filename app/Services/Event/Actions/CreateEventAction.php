<?php

namespace App\Services\Event\Actions;

use App\Http\Requests\Event\EventDto;
use App\Models\Event;
use App\Models\User;

class CreateEventAction
{
    public function __invoke(User $user, EventDto $dto): Event
    {
        return $user->events()->create([
            'title' => $dto->title,
            'start' => $dto->start,
            'end' => $dto->end,
            'color' => $dto->color,
        ]);
    }
}
