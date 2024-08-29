<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaListRecommendController;
use Illuminate\Foundation\Http\Middleware;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/createMediaList', [MediaListRecommendController::class, 'createMediaList'])->name('openai.createMediaList');