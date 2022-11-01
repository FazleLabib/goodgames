<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    //

    function show(Request $request) {
        $search = $request["search"] ?? "";
        if($search != "") {
            $games = Game::where('title', 'LIKE', "%$search%")
                    ->orwhere('developer', 'LIKE', "%$search%")
                    ->orwhere('genre', 'LIKE', "%$search%")
                    ->orwhere('platform', 'LIKE', "%$search%")
                    ->orwhere('year', 'LIKE', "%$search%")-> get();
        }
        else {
            $games =  Game::all();
        }
        $genres = Game::select('genre')->distinct()->get();
        $platforms = Game::select('platform')->distinct()->get();
        $years = Game::select(Game::raw('year'))->groupBy('year')->get();

        return view('home', compact('games', 'genres', 'platforms', 'years', 'search'));
    }

    function viewSpecificGame($id) {
        $gameInfo = Game::where('id',$id)->first();
        return view('game', ['gameInfo' => $gameInfo]);
    }

}
