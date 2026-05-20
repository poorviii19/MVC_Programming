<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResourceController;
use Illuminate\Http\Request;
use Illuminate\support\Facades\App;
use Illuminate\support\Facades\Session;

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

//localisation: 
// localisation is the process of translating the content of your application into different languages and adapting it to different cultures. Laravel provides a powerful localization system that allows you to easily manage translations and switch between languages.

// laarvel inbuilt functions for localisation:

// __(): This function is used to retrieve the translation of a given key. It accepts the key as an argument and returns the corresponding translation based on the current locale. For example, __('welcome') will return the translation for the 'welcome' key in the current language

//@lang: This directive is used in Blade templates to specify the language for a specific section of the template. It allows you to define different translations for different parts of your view. For example, @lang('welcome') will display the translation for the 'welcome' key in the current language.

Route::get('/lang',function(request $request){
    return view('lang');
});

Route::get('/set-lang/{lang}', function($lang){
    if(in_array($lang, ['en', 'es', 'hi'])){
        session(['locale'=>$lang]);
    }
    return redirect('/lang');
});

Route::get('/lang/{locale}',function ($locale){
    Session::put('locale',$locale);
    return redirect('/');
});

Route::get('/', function(){
    return view('hom1');
});

Route::get('/company', function (Request $request) {
    return view('company');
})->name('company');

// Language switch
Route::get('/lang/{locale}', function ($locale) {

    $availableLocales = ['en', 'hi', 'es'];

    if (in_array($locale, $availableLocales)) {
        Session::put('locale', $locale);
    }

    return redirect()->route('company');
});


Route::get('/form', [FormController::class, 'showForm']);
Route::post('/submit-form', [FormController::class, 'submitFrom']);

Route::resource('resource',ResourceController::class);



Route::get('/pincode-form', [FormController::class, 'showPincodeForm']);
Route::post('/submit-pincode', [FormController::class, 'submitPincode']);


Route::get('/', function() {
    return view('form1');
});
Route::get('/formfinal', function() {
    return view('form1');
});
Route::post('/submitfinal-form', [FormController::class, 'submitform1']);

Route::get('/insert',function(){
    // DB::table('employees')->insert([
    // 'empname'=>"John",
    // 'salaary'=>50000,
    // 'isuser'=>1,
    // 'birth_date'=>"2005-05-19"
    // ]);

    Employee::create([
        'empname'=>'Sreyanshi',
        'salary'=>200000,
        'isuser'=>1,
        'birthdate'=>'2005-07-23'
    ]);
    return 'Inserted';
});



Route::get('/insertit', function () {

    DB::table('recepies')->insert([

        [
            'recepie_name' => 'Paneer Butter Masala',
            'price' => 250,
            'description' => 'Creamy tomato based paneer curry with rich Indian spices.',
            'ingredients' => 'Paneer, Tomato, Butter, Cream, Onion, Spices',
            'created_at' => now(),
            'updated_at' => now()
        ],

        [
            'recepie_name' => 'Veg Biryani',
            'price' => 180,
            'description' => 'Aromatic basmati rice cooked with vegetables and spices.',
            'ingredients' => 'Rice, Carrot, Beans, Onion, Spices, Mint',
            'created_at' => now(),
            'updated_at' => now()
        ],

        [
            'recepie_name' => 'Margherita Pizza',
            'price' => 320,
            'description' => 'Classic Italian pizza with cheese and tomato sauce.',
            'ingredients' => 'Cheese, Tomato Sauce, Flour, Basil, Olive Oil',
            'created_at' => now(),
            'updated_at' => now()
        ],

        [
            'recepie_name' => 'Chocolate Brownie',
            'price' => 150,
            'description' => 'Soft and rich chocolate brownie dessert.',
            'ingredients' => 'Chocolate, Flour, Butter, Sugar, Cocoa Powder',
            'created_at' => now(),
            'updated_at' => now()
        ]

    ]);

    return "4 recipes inserted successfully";

});

Route::get('all->recepies', function(){
    return DB::table('recepies')->get();
});

Route::get('sort-recepie', function () {

    return DB::table('recepies')
            ->orderBy('recepie_name')
            ->get();

});

Route::get('update-recepie', function(){
    return DB::table('recepies')->where('id', 1)->update(['price'=>300]);
    
});
Route::get('delete-recepie', function(){
    return DB::table('recepies')->where('id', 3)->delete();
    
});

//to delete the table
// Route::get('update-recepie', function(){
//     return DB::table('recepies')->truncate;
    
// });


// ORM

use App\Models\Recepie;


Route::get('insertrecepie', function(){
    Recepie::create([
        'recepie_name' => 'Burger',
        'price' => 199,
        'description' => 'Cheesy crispy burger',
        'ingredients' => 'Bun, Cheese, Patty, Onion'
    ]);
    Recepie::create([
        'recepie_name' => 'Chowmin',
        'price' => 199,
        'description' => 'tasty chowmin',
        'ingredients' => 'noodles, veggies, oils, spices'
    ]);

    return "Recipe Inserted Successfully";
});
?>