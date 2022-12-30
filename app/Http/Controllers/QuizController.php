<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class QuizController extends Controller
{
    public function fetchQuiz(){
        $quiz = DB::table('quiz')
        ->inRandomOrder()
        ->limit(1)
        ->get();

        return view('AduMekanik.quiz', ['quiz' => $quiz]);
    }

    public function fetchData($id){
        $quiz = DB::table('quiz')
        ->where('id_quiz', '!=', $id)
        ->inRandomOrder()
        ->limit(1)
        ->get();

        return view('AduMekanik.loadQuiz', ['quiz' => $quiz]);
    }

    public function postPoint($value){
        $id = Auth::user()->id;

        if(DB::table('ranked')->where('user_id', '=', $id)->doesntExist()){
            DB::table('ranked')
            ->insert([
                'user_id' => $id,
                'points' => $value
            ]);
        } else{
            $old_data = DB::table('ranked')
            ->where('user_id', '=', $id)
            ->select('points')
            ->value('points');

            $value += $old_data;

            // check rank
            if($value > 0 && $value < 1000){
                $rank = "bronze";
            } else if ($value >= 1000 && $value < 10000){
                $rank = "silver";
            } else {
                $rank = "gold";
            }

            DB::table('ranked')
            ->where('user_id', '=', $id)
            ->update([
                'points' => $value,
                'standard' => $rank
            ]);   
        }
    }
}
