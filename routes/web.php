<?php

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('trainer/create-all', function() {
    return view('trainer/create-all');
})->middleware('auth');;
Route::post('trainer/create-all', 'TrainerController@create_all');
Route::resource('trainer', 'TrainerController')->middleware('auth');
Route::resource('education', 'EducationController')->middleware('auth');
Route::resource('work', 'WorkController')->middleware('auth');
Route::resource('certification', 'CertificationController')->middleware('auth');
Route::resource('reference', 'ReferenceController')->middleware('auth');
Route::resource('skill', 'SkillController')->middleware('auth');
Route::resource('expertise', 'ExpertiseController')->middleware('auth');

/*

   Curriculum Vitae
*/
Route::get('cv/{id}', 'CvController@show')->name('cv')->middleware('auth');

/*

   Portfolio
*/
Route::get('portfolio/{id}', 'CvController@portfolio')->name('portfolio')->middleware('auth');

/*

   Profile
*/
Route::prefix('user')->group(function () {
    Route::get('profile', 'ProfileController@showProfile')->name('profile.index');
    Route::put('update', 'ProfileController@updateProfile')->name('profile.update');
});