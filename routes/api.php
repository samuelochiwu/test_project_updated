<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function () {
    return response('api');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('articles', ArticleController::class);
Route::prefix('articles/{article}')->group(function () {
    Route::post('comment', [CommentController::class, 'store']);
    Route::get('like', [ArticleController::class, 'likeArticle']);
    Route::get('view', [ArticleController::class, 'viewArticle']);
});
