<?php

use App\Http\Controllers\Admin\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/live-count', [VoteController::class, 'liveCount'])->name('api.live-count');
