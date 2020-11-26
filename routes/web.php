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

Auth::routes();


Route::get('/', 'HomeController@index')->name('first');


Route::get('/quizz', function () {
    return view('quizz');
}); 

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //     return redirect()->route('home');
    // });
    Route::get('/home', 'QuestionController@getQuestions')->name('home');
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('question', 'QuestionController', ['except' => ['show','getQuestions']]);
    Route::resource('answer', 'QuestionController', ['except' => ['show','getAnwers']]);
    Route::resource('result', 'QuestionController', ['except' => ['show','getResults']]);

    Route::get('/emaillist', 'HomeController@getEmaillist')->name('emaillist'); 
    Route::delete('/email/{email}', 'HomeController@deleteEmail')->name('email.destroy');
    Route::get('/exportemail', 'HomeController@exportemail')->name('email.export');

    Route::get('questions', 'QuestionController@getQuestions')->name('questions'); 
    Route::get('answers', 'QuestionController@getAnwers')->name('answers'); 
    Route::get('results', 'QuestionController@getResutls')->name('results'); 

    Route::GET('/editAnswer/{id}', 'QuestionController@editAnswer')->name('editAnswer');

    Route::GET('/firstpage', 'HomeController@firstpage')->name('firstpage');
    Route::POST('/updatefirstpage', 'HomeController@updatefirstpage')->name('updatefirstpage');

    Route::GET('/emailpage', 'HomeController@emailpage')->name('emailpage');
    Route::POST('/updateemailpage', 'HomeController@updateemailpage')->name('updateemailpage');

    // Route::resource('diet', 'DietController', ['except' => ['show','adquestion']]);
    // Route::get('diets', 'DietController@addiet')->name('diets'); 
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::GET('/permission','UserController@permission')->name('user.permission');
    Route::POST('/permissionUpdate','UserController@permissionUpdate')->name('user.permissionUpdate');
    Route::post('permission/fetch', 'UserController@fetch')->name('permission.fetch');
    
});