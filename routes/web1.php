<?php

// to use this file go to bootstrap folder in the main folder 
// and then go to app.php then web: _DIR_.......web1.php uncomment as per the sue

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bladetemplateController;

Route::get('blade1', [bladetemplateController::class,'blade1']);

?>