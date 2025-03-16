<?php

use App\Livewire\Calendar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('calendar', Calendar::class);
