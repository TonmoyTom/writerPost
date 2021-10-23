<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function () {

        //User System
        Route::get('/user', 'User\UserController@index')->name('user');
        Route::get('/user/edit/{id}', 'User\UserController@edit')->name('user.edit');
        Route::post('/user/edit/{id}', 'User\UserController@update')->name('user.update');
        Route::delete('/user/delete/{id}', 'User\UserController@delete')->name('user.delete');


         //Categories System

         Route::get('/allcategories', 'Category\CategoryController@index')->name('categories.all');
         Route::get('/create/categories', 'Category\CategoryController@create')->name('categories.create');
         Route::post('/create/categories', 'Category\CategoryController@store')->name('categories.allstore');
   
         //Categories Edit System
   
         Route::get('/categories/edit/{id}', 'Category\CategoryController@edit')->name('categories.edit ');
         Route::post('/categories/edit/{id}', 'Category\CategoryController@update')->name('categories.update ');
         Route::post('/categories/delete/{id}', 'Category\CategoryController@delete')->name('categories.delete ');
         Route::Post('/categories', 'Category\CategoryController@categoriesstatus');

         //Tags System

         Route::get('/alltags', 'Tag\TagController@index')->name('tags.all');
         Route::get('/create/tags', 'Tag\TagController@create')->name('tags.create');
         Route::post('/create/tags', 'Tag\TagController@store')->name('tags.allstore');
   
         //Tags Edit System
   
         Route::get('/tags/edit/{id}', 'Tag\TagController@edit')->name('tags.edit ');
         Route::post('/tags/edit/{id}', 'Tag\TagController@update')->name('tags.update ');
         Route::post('/tags/delete/{id}', 'Tag\TagController@delete')->name('tags.delete ');
         Route::Post('/tags', 'Tag\TagController@tagsstatus');

         //Banner System

         Route::get('/allbanners', 'Banner\BannerController@index')->name('banners.all');
         Route::get('/create/banners', 'Banner\BannerController@create')->name('banners.create');
         Route::post('/create/banners', 'Banner\BannerController@store')->name('banners.allstore');  
  
         //Banner Edit System
         Route::get('/banners/view/{id}', 'Banner\BannerController@view')->name('banners.view');
         Route::get('/banners/edit/{id}', 'Banner\BannerController@edit')->name('banners.edit ');
         Route::post('/banners/edit/{id}', 'Banner\BannerController@update')->name('banners.update ');
         Route::delete('/banners/delete/{id}', 'Banner\BannerController@delete')->name('banners.delete ');
         Route::Post('/bannerupdatestatus', 'Banner\BannerController@bannerstatus');

        //Post System

        Route::get('/allposts', 'Post\PostController@index')->name('posts.all');
        Route::get('/create/posts', 'Post\PostController@create')->name('posts.create');
        Route::post('/create/posts', 'Post\PostController@store')->name('posts.allstore');  
   
        //Post Edit System
        Route::get('/posts/view/{slug}/{id}', 'Post\PostController@view')->name('posts.view');
        Route::get('/posts/edit/{slug}/{id}', 'Post\PostController@edit')->name('posts.edit ');
        Route::post('/posts/edit/{slug}/{id}', 'Post\PostController@update')->name('posts.update ');
        Route::delete('/posts/delete/{slug}/{id}', 'Post\PostController@delete')->name('posts.delete ');
        Route::Post('/postsupdatestatus', 'Post\PostController@postsstatus');


});
