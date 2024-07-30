<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordGenerator;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/generatePassword', [PasswordGenerator::class, 'generatePassword'])->name('generatePassword');
