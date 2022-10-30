<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    //
    
    function show() {
        $posters =  Game::select('poster')->get();
        $genres = Game::select('genre')->distinct()->get();
        $platforms = Game::select('platform')->distinct()->get();
        $years = Game::select(Game::raw('year'))->groupBy('year')->get();
        
        return view('home', compact('posters', 'genres', 'platforms', 'years'));
    }
}
