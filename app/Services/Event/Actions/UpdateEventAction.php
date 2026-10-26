<?php

namespace App\Services\Event\Actions;

use App\Http\Requests\Event\EventDto;
use App\Models\Event;

class UpdateEventAction
{
    public function __invoke(EventDto $dto, Event $event): void
    {
        $event->update([
            'title' => $dto->title,
            'start' => $dto->start,
            'end' => $dto->end,
            'color' => $dto->color,
        ]);
    }
}
