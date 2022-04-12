<?php
use Illuminate\Support\Facades\Route;

//ROUTE THE ADMINISTRATOR

    // para acceder a la administracion
    Route::get('/', 'AdminController@index')->name('admin');
    //USER
    Route::resource('users', 'UsersController', ['as' => 'admin']);
    //POSTS
    Route::resource('posts', 'PostsController', ['as' => 'admin']);
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    //STATES
    Route::resource('states', 'StatesController', ['as' => 'admin']);
    //CITYS
    Route::resource('citys', 'CityController', ['as' => 'admin']);
    //ROLE
    Route::resource('roles', 'RolesController', ['as' => 'admin']);

    //movimientos
    Route::get('records-users', 'RecordController@index')->name('admin.records');
    //rutas datatables ajax
    Route::get('record/generales', 'RecordController@recordGeneral');



//Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'],  function(){
//});

