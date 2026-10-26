<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\EventDto;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Services\Event\Actions\CreateEventAction;
use App\Services\Event\Actions\UpdateEventAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(): JsonResponse
    {
        $events = Auth::user()->events;

        return response()->json(EventResource::collection($events));
    }

    public function store(
        EventDto          $dto,
        CreateEventAction $createEventAction,
    ): JsonResponse
    {
        $event = $createEventAction(Auth::user(), $dto);

        return response()->json(new EventResource($event), 201);
    }

    public function update(
        EventDto          $dto,
        Event             $event,
        UpdateEventAction $updateEventAction,
    ): JsonResponse
    {
        $updateEventAction($dto, $event);

        return response()->json(new EventResource($event));
    }

    public function destroy(Event $event): JsonResponse
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
