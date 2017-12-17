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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', [
        'uses'  =>  'HomeController@index',
        'as'    =>  'home'
    ]);

    //route project
    Route::get('/projects/create', [
        'uses'  =>  'ProjectsController@create',
        'as'    =>  'projects.create'
    ])->middleware('admin');
    Route::get('/projects', [
        'uses'  =>  'ProjectsController@index',
        'as'    =>  'projects'
    ])->middleware('admin');
    Route::get('/projects/edit/{id}', [
        'uses'  =>  'ProjectsController@edit',
        'as'    =>  'projects.edit'
    ])->middleware('admin');
    Route::get('/projects/delete/{id}', [
        'uses'  =>  'ProjectsController@destroy',
        'as'    =>  'projects.delete'
    ])->middleware('admin');
    Route::post('/projects/store', [
        'uses'  =>  'ProjectsController@store',
        'as'    =>  'projects.store'
    ])->middleware('admin');
    Route::post('/projects/update/{id}', [
        'uses'  =>  'ProjectsController@update',
        'as'    =>  'projects.update'
    ])->middleware('admin');

    //route category
    Route::get('/categories', [
        'uses'  =>  'CategoriesController@index',
        'as'    =>  'categories'
    ])->middleware('admin');
    Route::get('/category/create', [
        'uses'  =>  'CategoriesController@create',
        'as'    =>  'category.create'
    ])->middleware('admin');
    Route::post('/category/store', [
        'uses'  =>  'CategoriesController@store',
        'as'    =>  'category.store'
    ])->middleware('admin');
    Route::get('/category/edit/{id}', [
        'uses'  =>  'CategoriesController@edit',
        'as'    =>  'category.edit'
    ])->middleware('admin');
    Route::get('/category/delete/{id}', [
        'uses'  =>  'CategoriesController@destroy',
        'as'    =>  'category.delete'
    ])->middleware('admin');
    Route::post('/category/update{id}', [
        'uses'  =>  'CategoriesController@update',
        'as'    =>  'category.update'
    ])->middleware('admin');

    Route::get('/users', [
        'uses'  =>  'UsersController@index',
        'as'    =>  'users'
    ])->middleware('admin');

});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    //route profile
    Route::get('/profile', [
        'uses'  =>  'ProfilesController@index',
        'as'    =>  'profile'
    ]);
    Route::post('/profile/store',[
        'uses'  =>  'ProfilesController@store',
        'as'    =>  'profile.store'
    ]);
    Route::post('/profile/update', [
        'uses'  =>  'ProfilesController@update',
        'as'    =>  'profile.update'
    ]);

});
