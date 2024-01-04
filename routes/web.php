<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdviceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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
});


//Quizコントローラー
Route::controller(QuizController::class)->middleware(['auth'])->group(function(){
	Route::post('/quizzes', 'store_quiz_block')->name('store_quiz_block'); //問題ブロックの保存処理
	Route::post('/quizzes/add', 'add_quiz')->name('add_quiz'); //問題文の追加
	Route::get('/quizzes/create', 'create')->name('create'); //投稿画面
	Route::get('/quizzes/home', 'home')->name('home'); //ホーム画面
	//Route::get('/quizzes/search', 'search')->name('search'); //検索
	//Route::get('/quizzes/research', 'research')->name('research'); //再検索
	//Route::put('/quizzes/{photo}', 'update')->name('update');//更新処理
	//Route::get('/quizzes/{photo}', 'show')->name('show');//閲覧画面
	//Route::delete('/quizzes/{photo}', 'delete')->name('delete'); //削除
	Route::get('/quizzes/{quiz_block}/edit', 'edit')->name('edit');//編集機能
	
});

require __DIR__.'/auth.php';
