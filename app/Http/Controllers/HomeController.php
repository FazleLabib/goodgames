<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\support\Facades\DB;

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
        $gameInfo = Game::where('id',$id)->firstorFail();

        $reviews = DB::table('games')
        ->select('users.name', 'users.image', 'ratings.rating', 'ratings.review')
        ->join('ratings','ratings.game_id','=','games.id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('ratings.game_id', $id)
        ->get();
        return view('game', compact('gameInfo', 'reviews'));
    }

    function showMyGames(Request $request, $id) {
        $search = $request["search"] ?? "";
        if($search != "") {
            $games = DB::table('ratings')
            ->select('games.id', 'games.poster')
            ->join('users', 'users.id', '=', 'ratings.user_id')
            ->join('games', 'ratings.game_id', '=', 'games.id')
            ->where('users.id', '=', $id)
            ->where(function($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                ->orwhere('genre', 'LIKE', "%$search%")
                ->orwhere('platform', 'LIKE', "%$search%")
                ->orwhere('year', 'LIKE', "%$search%");
            })->get();
        }
        else {
            $games = DB::table('ratings')
            ->select('games.id', 'games.poster')
            ->join('users', 'users.id', '=', 'ratings.user_id')
            ->join('games', 'ratings.game_id', '=', 'games.id')
            ->where('users.id', '=', $id)
            ->get();
        }

        $genres = DB::table('ratings')
        ->select('games.genre')
        ->join('users', 'users.id', '=', 'ratings.user_id')
        ->join('games', 'ratings.game_id', '=', 'games.id')
        ->where('users.id', '=', $id)
        ->distinct()
        ->get();

        $platforms = DB::table('ratings')
        ->select('games.platform')
        ->join('users', 'users.id', '=', 'ratings.user_id')
        ->join('games', 'ratings.game_id', '=', 'games.id')
        ->where('users.id', '=', $id)
        ->distinct()
        ->get();

        $years = DB::table('ratings')
        ->select('games.year')
        ->join('users', 'users.id', '=', 'ratings.user_id')
        ->join('games', 'ratings.game_id', '=', 'games.id')
        ->where('users.id', '=', $id)
        ->distinct()
        ->get();

        return view('user-games', compact('games', 'genres', 'platforms', 'years', 'search'));
    }

}
