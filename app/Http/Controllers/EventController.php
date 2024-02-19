<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;

use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    //obtener los eventos ordenados por fecha
    $orderEvents = Event::where('date', '>=', now())->orderBy('date', 'asc')->get();

    //obtener los IDs de los eventos que le gustan al usuario (si está autenticado)
    $likes = [];
    if (Auth::check()) {
        $user = Auth::user();
        $likes = $user->likedEvents()->pluck('id')->toArray();
    }

    // Pasar los datos a la vista
    return view('events.index', compact('orderEvents', 'likes'));
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
        $like = false;
    if (Auth::check()) {
        $user = Auth::user();
        $like = $user->likedEvents()->where('id', $event->id)->exists();
    }

    // Mostrar detalles del evento
    return view('events.show', compact('event', 'like'));
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

    //función para dar like
    public function EventLike(Request $request, Event $event)
    {
        $event = Event::findOrFail($event->id);
        $userId = auth()->id();
        $event->users()->attach($userId);

        return redirect()->back();
    }

    //función para quitar like
    public function deleteLike(Request $request, Event $event)
    {
        $user = auth()->user();

        if($user->likedEvents()->where('id', $event->id)->exists())
        {
            $user->likedEvents()->detach($event->id);
            return redirect()->back();
        }

        return redirect()->back();
    }
}
