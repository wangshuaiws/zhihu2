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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('question','QuestionsController');
Route::resource('article','ArticlesController',['names' => [
    'create' => 'article.create'
]]);
Route::resource('answer','AnswersController');
Route::post('/answer/{id}','AnswersController@update');
Route::get('/answer/{id}/delete','AnswersController@destroy');
Route::post('/search','HomeController@search');
Route::post('/comment/create', 'CommentsController@create');
Route::get('/information/{name}','HomeController@information')->name('information');
Route::get('/information/{name}/edit','HomeController@edit')->name('information_edit');
Route::post('/information/edit','HomeController@editInformation')->name('edit_information');