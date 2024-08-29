<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaListRecommendController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/createMediaList', [MediaListRecommendController::class, 'createMediaList'])->name('openai.createMediaList');