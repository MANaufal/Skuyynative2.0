<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\leaderboardController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('home', [leaderboardController::class, 'getLeaderboard'])->name('home');

    //quiz
    Route::get('quiz', [QuizController::class, 'fetchQuiz'])->name('quiz');
    Route::get('fetchQuiz/{id}', [QuizController::class, 'fetchData']);
    Route::get('postPoint/{value}', [QuizController::class, 'postPoint']);

    //chat
    Route::get('chat', [ChatController::class, 'index']);
    Route::get('chats/{id}', [ChatController::class, 'chats'])->name('chats');
    Route::get('friendList', [ChatController::class, 'friendList']);
    Route::get('getMessage/{id}', [ChatController::class, 'getMessage']);
    Route::post('sendChat/{id}', [ChatController::class, 'sendChat'])->name('sendChat');
});

Route::get('chooseLanguage', function(){
    return view('pickLanguage');
})->name('chooseLanguage');

Route::get('home', [leaderboardController::class, 'getLeaderboard'])->name('home');

Route::get('quiz', [QuizController::class, 'fetchQuiz']);
Route::get('fetchQuiz/{id}', [QuizController::class, 'fetchData']);
Route::get('postPoint/{value}', [QuizController::class, 'postPoint']);

require __DIR__.'/auth.php';
