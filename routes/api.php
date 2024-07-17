<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'blog'], function (): void {
    Route::get('', [BlogController::class, 'index']);
    Route::delete('{article}', [BlogController::class, 'delete']);
    Route::patch('{article}', [BlogController::class, 'edit']);
    Route::post('', [BlogController::class, 'create']);
});

Route::post('sendMail',MailController::class);
Route::post('sendTelegram', TelegramController::class);
