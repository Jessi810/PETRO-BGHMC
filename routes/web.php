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

Route::resource('trainer', 'TrainerController');
Route::resource('education', 'EducationController');
Route::resource('work', 'WorkController');
Route::resource('certification', 'CertificationController');
Route::resource('reference', 'ReferenceController');
Route::resource('skill', 'SkillController');

/*

   Curriculum Vitae
*/
Route::get('cv/{id}', 'CvController@show')->name('cv');

/*

   Portfolio
*/
Route::get('portfolio/{id}', 'CvController@portfolio')->name('portfolio');