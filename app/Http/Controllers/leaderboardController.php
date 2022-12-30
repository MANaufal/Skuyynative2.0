<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class leaderboardController extends Controller
{
    public function getLeaderboard(){
        $id = Auth::user()->id;

        if(DB::table('ranked')->where('user_id', '=', $id)->doesntExist()){
            DB::table('ranked')
            ->insert([
                'user_id' => $id,
                'points' => 0
            ]);
        }

        $leaderboard = DB::table('ranked')
        ->where('user_id', '=', $id)
        ->get();

        // $leaderboard = DB::table('ranked')
        // ->join('users', 'users.id', '=', 'ranked.user_id')
        // ->select('ranked.points', 'users.name', 'ranked.standard')
        // ->get();

        return view('home', ['leaderboard' => $leaderboard]);
    }
}
