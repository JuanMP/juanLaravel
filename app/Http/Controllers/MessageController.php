<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        //Almacenamos nuevo mensaje
        $message = new Message();
        $message->name = $request->get('name');
        $message->subject = $request->get('subject');
        $message->text = $request->get('text');
        $message->save();

        return view('messages.stored', compact('message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
        $message = Message::findOrFail($message->id);
        $message->readed = true;
        $message->save();

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //ruta para poder borrar desde mensajes show
        $message->delete();
        return redirect()->route('messages.index');
    }
}
