<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RecepieController;

Route::get('/recepies', [RecepieController::class, 'index']);