<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;


Route::get('/post',[BlogController::class, 'getBlog']);
// Route::get('/ye', function(Request $request){
//     $request->session()->put('name', 'poorvi');
//     return 'Session set';
// });

Route::get('/country', function(Request $request ){
    $request->session()->put(['countries'=>['A', 'B', 'C']]);
    return 'Session set';

});


Route::get('/ye', function(Request $request){
    return [
        'put'=>$request->session()->put('name', 'poorvi'),
        'put-multiple'=>$request->session()->put(['countries'=>['A', 'B', 'C']], ['company'=>[]]),
        'push'=>$request->session()->push('company', 'KFC'),
        'session'=>session(['currency'=>'INR'])
    ];
});

Route::get('/get-session', function(Request $request){
    return [
        'get'=>$request->session()->get('company'),
        'domain-using-session'=>session('domain'),
        'default-value'=>$request->session()->get('name', 'Palak'),
        'all'=>$request->session()->all(),
        'has'=>$request->session()->has('countries')?'true':'false',
        'exists'=>$request->session()->exists('section')?'true':'false'
    ];
});


// try flush, forget and pull

Route::get('/set', function(Request $request){
    $request->session()->now('info','hello flash');
    return redirect('/now-test');
});

Route::get('/now-test', function(Request $request){
    return view('now');
});
?>