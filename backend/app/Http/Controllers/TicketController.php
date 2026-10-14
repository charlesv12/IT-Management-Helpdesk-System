<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Ticket::query()->latest()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $ticket = Ticket::create($this->validated($request, true));

        return response()->json($ticket, 201);
    }

    public function show(Ticket $ticket): JsonResponse
    {
        return response()->json($ticket);
    }

    public function update(Request $request, Ticket $ticket): JsonResponse
    {
        $ticket->update($this->validated($request));

        return response()->json($ticket->refresh());
    }

    private function validated(Request $request, bool $creating = false): array
    {
        $data = $request->validate([
            'requester_name' => ['required', 'string', 'max:120'],
            'requester_email' => ['required', 'email', 'max:255'],
            'category' => ['required', Rule::in(['Hardware', 'Software', 'Network', 'Account access', 'Other'])],
            'priority' => ['required', Rule::in(['Low', 'Medium', 'High', 'Urgent'])],
            'subject' => ['required', 'string', 'max:180'],
            'description' => ['required', 'string', 'max:10000'],
        ]);

        if ($creating) {
            $data['status'] = 'Open';
        }

        return $data;
    }
}
