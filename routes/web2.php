<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


Route::get('/post',[BlogController::class, 'getBlog']);

?>