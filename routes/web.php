<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function(){
    return view('dashboard.admin');
})->middleware('admin');

Route::get('/jobseeker', function(){
    return view('dashboard.jobseeker');
})->middleware('jobseeker');

Route::get('/employer', function(){
    $user = Auth::id();
    $emprofile = DB::table('employer_profiles')
    ->where('user_id', '=', $user)
    ->get();
    return view('dashboard.employer')->with('emprofile', $emprofile);
    // return view('dashboard.employer');
})->middleware('employer');
