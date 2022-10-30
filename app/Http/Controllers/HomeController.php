<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    //
    
    function home() {
        //return view('home');
        $game =  Game::all();
        return view('home', ['games' => $game]);
    }
    
    
    
}
