<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Game;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Redirect;

class RatingController extends Controller
{
    //
    function log(Request $request, $id) {

        $values = array(
    		'user_id' => $request->input('user_id'),
    		'game_id' => $request->input('game_id'),
            'rating' => $request->input('rating2'),
            'review' => $request->input('review'),
            'date' => $request->input('log-date')
    	);

    	DB::table('ratings')->insert($values);

        return Redirect::back()->with('msg','You have successfully logged this game.');
    }

    function gameStats() {
        $id = Auth::User()->id;
        $gameCount = Rating::where('user_id', $id)->count();
        $reviews = DB::table('games')
        ->select('ratings.id', 'games.title','games.poster', 'games.year', 'ratings.rating', 'ratings.review', 'ratings.date')
        ->join('ratings','ratings.game_id','=','games.id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('users.id', $id)
        ->get();

        $favs = DB::table('games')
        ->select('games.id','games.poster', 'ratings.favorite_flag')
        ->join('ratings','ratings.game_id','=','games.id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('users.id', $id)
        ->where(function($query) {
            $query->where('ratings.favorite_flag', '1');
        })->get();

        return view('profile-page', compact('gameCount', 'reviews', 'favs'));
    }

    function show(Request $request) {
        $id = Auth::User()->id;
        $search = $request["search"] ?? "";
        if($search != "") {

            $games = DB::table('games')
            ->select('games.id','games.title','games.developer', 'games.year', 'ratings.favorite_flag')
            ->join('ratings','ratings.game_id','=','games.id')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->where(function($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })->get();

        }
        else {

            $games =  DB::table('games')
            ->select('games.id','games.title','games.developer', 'games.year', 'ratings.favorite_flag')
            ->join('ratings','ratings.game_id','=','games.id')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->get();

        }
        $favs = DB::table('games')
        ->select('games.id','games.poster', 'ratings.favorite_flag')
        ->join('ratings','ratings.game_id','=','games.id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('users.id', $id)
        ->where(function($query) {
            $query->where('ratings.favorite_flag', '1');
        })->get();

        $favCount = DB::table('games')
        ->select('games.id','games.poster', 'ratings.favorite_flag')
        ->join('ratings','ratings.game_id','=','games.id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('users.id', $id)
        ->where(function($query) {
            $query->where('ratings.favorite_flag', '1');
        })->count();
        return view('edit-profile', compact('games', 'search', 'favs', 'favCount'));
    }

    function addFav($id) {
        DB::update('update ratings set favorite_flag = 1 where game_id = ?', [$id]);
        return redirect('settings')->with('success', 'This game was added to your favorite list');
    }

    function removeFav($id) {
        DB::update('update ratings set favorite_flag = 0 where game_id = ?', [$id]);
        return redirect('settings')->with('success', 'This game was removed from your favorite list');
    }

    function editLog(Request $request, $id) {
        $values = [
            'rating' => $request->input('rating2'),
            'review' => $request->input('review'),
            'date' => $request->input('log-date')
        ];

        DB::table('ratings')
        ->where('id', $id)
        ->update($values);
        return redirect('profile')->with('success', "This game's log info was successfully edited");

    }

    function deleteLog($id) {
        DB::table('ratings')->where('id', $id)->delete();
        return redirect('profile')->with('success', "This game's log info was successfully deleted");
    }
}
