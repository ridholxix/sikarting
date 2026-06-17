<?php

use App\Http\Controllers\BobotController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\StuntingController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('gejalas', GejalaController::class);
    Route::resource('stuntings', StuntingController::class);
    Route::resource('bobots', BobotController::class);
});

Route::prefix('diagnosa')->group(function(){
    Route::get('/', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::get('/create', [DiagnosaController::class, 'create'])->name('diagnosa.create');
    Route::post('/show', [DiagnosaController::class, 'proses'])->name('diagnosa.proses');
    Route::post('/step-real', [DiagnosaController::class, 'step'])->name('diagnosa.step');
})->middleware('auth');

