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


Route::get('/', 'HomeController@index')->name('mainhome');

/* Internal Pages Routes */
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@store')->name('contact.store');

Auth::routes();

/* User Pages Routes */
Route::get('/dashboard', 'DashboardController@index'); 

/* Post Routes */
Route::resource('/post','PostsController');

/* Category Routes */
Route::resource('/category','CategoryController');

/* Tag Routes */
Route::resource('/tag','TagController');

/* Comment Routes */
Route::post('comments/{post_id}',['uses' => 'CommentsController@store','as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentsController@edit','as' => 'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentsController@update','as' => 'comments.update']);
Route::delete('comments/{id}',['uses' => 'CommentsController@destroy','as' => 'comments.destroy']);
Route::get('comments/{id}/delete',['uses' => 'CommentsController@delete','as' => 'comments.delete']);

Auth::routes();

/* Admin Routes */
Route::get('admin/routes', 'AdminController@index')->middleware('admin');
Route::delete('admin/post/{post}',['uses' => 'AdminController@destroy','as' => 'adminpost.destroy']);
