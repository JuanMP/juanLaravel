<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //APLICAR LAS 3 FUNCIONES EXTRA DE ADMIN

    public function addPlayer()
    {
        return view('admin.player');
    }

    public function addEvent()
    {
        return view('admin.event');
    }

    public function messages()
    {
        return view('admin.messages');
    }

    /*public function saveEvent()
    {
        return view('admin.event');
    }

    public function savePlayer()
    {
        return view
    }
    */

}
