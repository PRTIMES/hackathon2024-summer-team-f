<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [OpenAIController::class, 'createMediaList'])->name('openai.createMediaList');