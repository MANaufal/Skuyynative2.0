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

    public function fetchAnswer($id){
        $answer = DB::table('quiz')
        ->where('id_quiz', '=', $id)
        ->get();

        return view('answer', ['answer' => $answers]);
    }

    public function fetchData(){
        $quiz = DB::table('quiz')
        ->inRandomOrder()
        ->limit(1)
        ->get();

        return view('quiz', ['quiz' => $quiz]);
    }
}
