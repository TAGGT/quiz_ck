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
	Route::post('/quizzes/add', 'add_quiz')->name('add_quiz'); //クイズカラムの追加
	Route::get('/quizzes/create', 'create')->name('create'); //投稿画面
	Route::get('/quizzes/home', 'home')->name('home'); //ホーム画面
	Route::get('/quizzes/{quiz}/quiz', 'column_edit')->name('column_edit'); //クイズカラムの編集画面
	//Route::get('/quizzes/search', 'search')->name('search'); //検索
	//Route::get('/quizzes/research', 'research')->name('research'); //再検索
	Route::put('/quizzes/{quiz_block}', 'block_update')->name('update');//クイズブロック更新処理
	Route::put('/quizzes/{quiz}/quiz', 'column_update')->name('update');//クイズカラム更新処理
	//Route::get('/quizzes/{photo}', 'show')->name('show');//閲覧画面
	Route::delete('/quizzes/{quiz_block}', 'delete_quiz_block')->name('delete_quiz_block'); //クイズブロックの削除
	Route::delete('/quizzes/{quiz}/quiz', 'delete_quiz')->name('delete_quiz'); //クイズカラムの削除
	Route::get('/quizzes/{quiz_block}/edit', 'edit')->name('edit');//編集画面の表示
	
	
});

require __DIR__.'/auth.php';
