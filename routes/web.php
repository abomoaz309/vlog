<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@welcome')->name('frontend.landing');

Route::namespace("BackEnd")->prefix("admin")->middleware('admin')->group(function () {
    Route::get('home', 'Home@index')->name('admin.home');
    Route::get('/', 'Home@index');
    Route::resource('users', 'usersController')->except(['show']);
    Route::resource('categories', 'categoriesController')->except(['show']);
    Route::resource('skills', 'skillsController')->except(['show']);
    Route::resource('tags', 'tagsController')->except(['show']);
    Route::resource('pages', 'pagesController')->except(['show']);
    Route::resource('videos', 'videosController')->except(['show']);
    Route::resource('messages', 'messagesController')->only(['index', 'delete', 'edit', 'update', 'destroy']);
    Route::post('videos/{id}/edit/comment', 'commentsController@store')->name('comment.create');
    Route::patch('comments/{id}/edit', 'commentsController@update')->name('comment.update');
    Route::delete('comment/{id}/delete', 'commentsController@destroy')->name('comment.destroy');
    Route::post('reply-message/{id}', 'messagesController@replyMessage')->name('reply.message');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@category')->name('frontend.category');
Route::get('/page/{id}/{slug?}', 'HomeController@page')->name('frontend.page');
Route::get('/profile/{id}/{slug?}', 'HomeController@userProfile')->name('frontend.profile');
Route::get('/profile/{id}/{slug?}/edit', 'HomeController@editProfile')->name('frontend.editprofile');
Route::patch('/profile/{id}/{slug?}', 'HomeController@updateProfile')->name('frontend.updateprofile');
Route::get('/skill/{id}', 'HomeController@skill')->name('frontend.skill');
Route::get('/video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('/tag/{id}', 'HomeController@tag')->name('frontend.tag');
Route::delete('comment/{id}/delete', 'HomeController@destroyComment')->name('comments.destroy');
Route::patch('comments/{id}/edit', 'HomeController@updateComment')->name('comments.update');
Route::post('comments/create', 'HomeController@createComment')->name('comments.create');
Route::post('contact-us', 'HomeController@messageStore')->name('contact.store');

Auth::routes();

