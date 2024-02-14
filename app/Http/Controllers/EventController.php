<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //likes


        //devuelve los eventos
        //$events = Event::All();
        //return view('events.index', compact('events'));

        //devuelve los eventos ordenados por fecha
        $orderEvents = Event::where('date', '>=', now())->orderBy('date', 'asc')->get();

        return view('events.index', ['orderEvents' => $orderEvents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //devuelve la creación de eventos
        $events = Event::All();
        return view('events.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //Almacenamos el nuevo evento en la base de datos
        $event = new Event();
        $event->name = $request->get('name');
        $event->description = $request->get('description');
        $event->location = $request->get('location');
        $event->date = $request->get('date');
        $event->hour = $request->get('hour');
        $event->type = $request->get('type');
        $event->tags = $request->get('tags');
        $event->visibility = $request->has('visibility')? 1 : 0;
        $event->save();

        return view('events.stored', compact('event'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //mostrar detalles de un evento (último punto)
        return view('events.show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //función para editar el evento si eres admin
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //validar y actualizar lo editado
        $request->validate([
            'name' => 'required|string|max:30',
        ]);

        //actualizar los datos del evento con los datos del formulario
        $event->update($request->all());

        return redirect()->route('events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //función para eliminar un evento
        $event->delete();

        return redirect()->route('events.index');
    }
}
