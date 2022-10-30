<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    //
    
    function show() {
        $games =  Game::all();
        $genres = Game::select('genre')->distinct()->get();
        $platforms = Game::select('platform')->distinct()->get();
        $years = Game::select(Game::raw('year'))->groupBy('year')->get();

        return view('home', compact('games', 'genres', 'platforms', 'years'));
    } 

    function viewSpecificGame($id) {
        $gameInfo = Game::where('id',$id)->first();
        return view('game', ['gameInfo' => $gameInfo]);
    }
}
