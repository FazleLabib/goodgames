<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    //
    
    function showCards() {
        //return view('home');
        $game =  Game::select('poster')->get();
        return view('home', ['games' => $game]);
    }
    
    // function view($view)
    // {
    // $ms = Person::where('name', '=', 'Foo Bar')->first();

    // $persons = Person::order_by('list_order', 'ASC')->get();

    // return $view->with('persons', $persons)->with('ms', $ms);
    // }
    
    // function home($view) {
    //     $game =  Game::all();
    //     $genre = Game::select('genre')->distinct()->get();
    //     return $view->with('games', $game)->with('genre', $genre);
    // }
    
}
