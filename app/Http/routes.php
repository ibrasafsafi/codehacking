<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);

route::group(['middleware' => 'admin'], function () {

    route::resource('/admin/users', 'AdminUsersController');
    route::resource('/admin/posts', 'AdminPostsController');
    route::resource('/admin/categories', 'AdminCategoriesController');
    route::resource('/admin/media', 'AdminMediaController');
    route::resource('/admin/comments', 'PostCommentsController');
    route::resource('/admin/comment/replies', 'CommentRepliesController');


});

route::group(['middleware' => 'admin'], function () {

    route::post('/comment/replies', 'CommentRepliesController@createReply');

});