<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Devuelve los jugadores
        $players = Player::All();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $players = Player::All();
        return view('players.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request)
    {
        //Almacenamos nuevo jugador en la base de datos
        $player = new Player();
        $player->name = $request->get('name');
        $player->position = $request->get('position');
        $player->number = $request->get('number');
        $player->twitter =  $request->get('twitter');
        $player->instagram = $request->get('instagram');
        $player->twitch = $request->get('twitch');

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/players');
            $player->photo = str_replace('public/', '/storage/', $photoPath);

        }
        $player->visibility = $request->has('visibility')? 1 :0;
        $player->save();

        return view('players.stored', compact('player'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //El método para visualizar un jugador en concreto cuando se le hace click
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
