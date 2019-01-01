<?php

//Admin section
Route::group(['prefix'=>'dashboard','namespace'=>'admin'], function (){

    Route::get('admin','HomeController@index')->name('admin');
});
/*Auth::routes();*/
Route::group(['prefix'=>'admin','namespace'=>'admin\auth'], function (){

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');


});
Route::group(['prefix'=>'dashboard/admin','middleware'=>'auth','namespace'=>'admin\page'], function (){

    Route::resource('tag', 'TagController')->middleware('isAdmin');
    Route::resource('category', 'CategoryController')->middleware('isAdmin');
    Route::resource('post', 'PostsController');
    Route::get('/pending/post','PostsController@pending')->name('post.pending')->middleware('isAdmin');
    Route::put('/post/{id}/approve','PostsController@approval')->name('post.approve')->middleware('isAdmin');

});




// front section

Route::get('/', 'frontend\HomeController@index')->name('home');

