<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FeedbackController;
Route::get('/', [ArticlesController::class, 'index'])->name('main');
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/{article}', [ArticlesController::class, 'show']);
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::post('/articles', [ArticlesController::class, 'store']);
Route::patch('/articles/{article}', [ArticlesController::class, 'update']);
Route::delete('/articles/{article}', [ArticlesController::class, 'destroy']);

Route::get('/admin/feedback', [FeedbackController::class, 'index']);
Route::get('/contacts', [FeedbackController::class, 'create']);
Route::post('/contacts', [FeedbackController::class, 'store']);
Route::get('/about', function(){
    return view('about');
});

