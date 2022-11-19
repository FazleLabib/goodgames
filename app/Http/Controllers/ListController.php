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
}
