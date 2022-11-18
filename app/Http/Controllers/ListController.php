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

    function show() {
        $lists = GameList::all();
        return view('lists', compact('lists'));
    }

    function createList(Request $request) {
        $id = Auth::User()->id;
        $values = array(
    		'user_id' => $id,
            'name' => $request->input('name'),
            'description' => $request->input('description')
    	);

    	DB::table('lists')->insert($values);

        return redirect('lists')->with('success', 'You have successfully created a list');
    }
}
