<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Game;
use App\Models\GameList;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Redirect;

class ListController extends Controller
{
    //

    function show(Request $request) {

        $search = $request["search"] ?? "";
        if($search != "") {

            $lists = DB::table('game_lists')
            ->select('game_lists.id as list_id', 'game_lists.user_id', 'game_lists.name as title', 'game_lists.description', 'users.name')
            ->join('users', 'game_lists.user_id', '=', 'users.id')
            ->where(function($query) use ($search) {
                $query->where('game_lists.name', 'LIKE', "%$search%");
            })->get();

        }
        else {

            $lists = DB::table('game_lists')
            ->select('game_lists.id as list_id', 'game_lists.user_id', 'game_lists.name as title', 'game_lists.description', 'users.name')
            ->join('users', 'game_lists.user_id', '=', 'users.id')
            ->get();

        }
        return view('lists', compact('lists', 'search'));
    }

    function createList(Request $request) {
        $id = Auth::User()->id;
        $values = array(
    		'user_id' => $id,
            'name' => $request->input('name'),
            'description' => $request->input('description')
    	);

    	DB::table('game_lists')->insert($values);

        return redirect('lists')->with('success', 'You have successfully created a list');
    }

    function viweSpecificList($id) {
        $listInfo = GameList::where('id',$id)->firstorFail();

        $games = DB::table('game_lists')
        ->select('game_lists.id as list_id',
        'list_contains.list_id', 'list_contains.game_id',
        'games.id as game_id', 'games.poster')
        ->join('list_contains', 'list_contains.list_id', '=', 'game_lists.id')
        ->join('games', 'list_contains.game_id', '=', 'games.id')
        ->where('game_lists.id', '=', $id)
        ->get();
        return view('list-page', compact('listInfo', 'games'));
    }

    function showListInfo(Request $request, $id) {
        $listInfo = GameList::where('id',$id)->firstorFail();
        $search = $request["search"] ?? "";
        if($search != "") {
            $games = Game::where('title', 'LIKE', "%$search%")
                    ->orwhere('developer', 'LIKE', "%$search%")
                    ->orwhere('genre', 'LIKE', "%$search%")
                    ->orwhere('platform', 'LIKE', "%$search%")
                    ->orwhere('year', 'LIKE', "%$search%")-> get();
        }
        else{
            $games = "";
        }
        return view('edit-list', compact('listInfo', 'games', 'search'));
    }

}
