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
}
