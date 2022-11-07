<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
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

}
