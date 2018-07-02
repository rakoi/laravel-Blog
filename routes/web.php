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
	Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle']);
	Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@index']);
	Route::get('page',['uses'=>'PagesController@getPage','as'=>'create']);
	Route::get('/','PagesController@getIndex');
	Route::get('about','PagesController@getAbout');
	Route::get('contact','PagesController@getContact');
	Route::get('edit',['uses'=>'PagesController@getEdit','as'=>
		'edit']);	
		Route::resource('posts','PostController');


	Route::get('/home', 'HomeController@index')->name('home');
	Auth::routes();

		
		Route::resource('category','CategoryController',['except'=>'create']);
		Route::resource('tags','TagsController');



	Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
	Route::put('comments/{comments_id}',['uses'=>'CommentsController@update','as'=>'comments.update']);

	Route::get('comments/{comment_id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);

	Route::get('comments/{id}/destroy',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);

	Route::get('comments/{id}',['uses'=>'CommentsController@delete','as'=>'comments.delete']);
		

		Route::get('posted','PagesController@getPosted');
	