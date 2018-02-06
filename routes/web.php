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
    $divisions = DB::table('divisions')->get();
    $subdivisions = DB::table('subdivisions')->get();
    
    return view('trainer/create-all', ['divisions' => $divisions, 'subdivisions' => $subdivisions]);
})->middleware('auth');
Route::post('trainer/create-all', 'TrainerController@create_all');
Route::get('trainer/{id}/upload', 'TrainerController@showUpload')->name('trainer.upload.show');
Route::post('trainer/{id}/upload', 'TrainerController@uploadProfile')->name('trainer.upload.store');
Route::get('trainer/data', 'TrainerController@getTrainers')->name('trainer.data');
Route::resource('trainer', 'TrainerController')->middleware('auth');
Route::resource('education', 'EducationController')->middleware('auth');
Route::resource('work', 'WorkController')->middleware('auth');
Route::resource('certification', 'CertificationController')->middleware('auth');
Route::resource('reference', 'ReferenceController')->middleware('auth');
Route::resource('skill', 'SkillController')->middleware('auth');
Route::resource('expertise', 'ExpertiseController')->middleware('auth');
Route::resource('training', 'TrainingController')->middleware('auth');
Route::resource('division', 'DivisionController')->middleware('auth');

Route::get('employee/get', 'DivisionController@getEmployee')->name('employee.get');
Route::get('employee/data', 'DivisionController@getEmployees')->name('employee.data');

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
Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@showProfile')->name('profile.index');
    Route::put('update', 'ProfileController@updateProfile')->name('profile.update');
});

Route::get('/debug', function () {
    return view('debug');
});