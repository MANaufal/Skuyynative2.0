<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuizController extends Controller
{
    public function fetchQuiz(){
        $quiz = DB::table('quiz')
        ->inRandomOrder()
        ->limit(1)
        ->get();

        return view('app', ['quiz' => $quiz]);
    }

    //WIP
    public function fetchAnswer($id){
        return view('answer', ['id' => $id]);
    }

    public function fetchData(){
        $quiz = DB::table('quiz')
        ->inRandomOrder()
        ->limit(1)
        ->get();

        return view('quiz', ['quiz' => $quiz]);
    }
}
