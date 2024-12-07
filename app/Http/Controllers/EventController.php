<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && !(auth()->user()->rol == 'admin' || auth()->user()->is_presidente)) {
                return redirect()->route('events.index');
            }
            return $next($request);
        })->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    
    public function index(Request $request): View
    {
        $events = Event::paginate();

        return view('event.index', compact('events'))
            ->with('i');
    }

    
    public function create(): View
    {
        $event = new Event();

        return view('event.create', compact('event'));
    }

   
    public function store(EventRequest $request): RedirectResponse
    {
        Event::create($request->validated());

        return Redirect::route('events.index')
            ->with('success', 'Evento creado exitosamente!.');
    }

    
    public function show($id): View
    {
        $event = Event::find($id);

        return view('event.show', compact('event'));
    }

  
    public function edit($id): View
    {
        $event = Event::find($id);

        return view('event.edit', compact('event'));
    }

    
    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->validated());

        return Redirect::route('events.index')
            ->with('success', 'Evento actualizado con exito!');
    }

    public function destroy($id): RedirectResponse
    {
        Event::find($id)->delete();

        return Redirect::route('events.index')
            ->with('success', 'Evento eliminado exitosamente!');
    }
}
