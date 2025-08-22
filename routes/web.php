<?php

use App\Http\Controllers\CspViolationController;
use App\Http\Controllers\WaitingListController;
use App\Http\Middleware\SecurityHeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::middleware(SecurityHeaders::class)->group(function () {
    Route::get('/', [WaitingListController::class, 'show'])
        ->name('waiting-list');

    Route::post('/subscriber/register', [WaitingListController::class, 'store'])
        ->name('subscriber.register')
        ->middleware('throttle:60,1');

    Route::get('/subscriber/verify/{token}', [WaitingListController::class, 'verify'])
        ->name('subscriber.verify');
});

Route::post('/csp-report', CspViolationController::class)->middleware('throttle:60,1')->name('csp.report');
