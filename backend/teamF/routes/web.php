<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaListRecommendController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [MediaListRecommendController::class, 'createMediaList'])->name('openai.createMediaList');