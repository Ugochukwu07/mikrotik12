<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-ticket')) {
            return redirect('dashboard');
        }

        return view('admin.tickets.tickets-index');
    }

    public function create()
    {
        if (!auth()->user()->isUser()) {
            return redirect('dashboard');
        }

        return view('admin.tickets.tickets-create');
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->ticketId = $ticket->generateRandomNumber();
        $ticket->priority = $request->priority;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->status = 1;
        $ticket->user_id = auth()->id();
        $ticket->save();

        return redirect('tickets')->with('success', __('Ticket created successfully'));
    }

    public function show(Ticket $ticket)
    {
        if (!auth()->user()->can('view-ticket')) {
            return redirect('dashboard');
        }

        return view('admin.tickets.tickets-show', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update([
            'status' => $request->status
        ]);

        return redirect('tickets')->with('success', __('Ticket status updated successfully'));
    }
}
