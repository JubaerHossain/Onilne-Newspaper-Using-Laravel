<?php

//Admin section
Route::group(['prefix'=>'dashboard','namespace'=>'admin'], function (){

    Route::get('admin','DashboardController@index')->name('admin');
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
Route::group(['prefix'=>'dashboard/admin','middleware'=>['auth','clearance'],'namespace'=>'admin\page'], function (){

    Route::resource('tag', 'TagController')->middleware('isAdmin');
    Route::resource('category', 'CategoryController')->middleware('isAdmin');
/*    Route::resource('post', 'PostsController')->middleware('clearance');*/
    Route::get('post/', 'PostsController@index')->name('post.index');
    Route::get('post/create', 'PostsController@create')->name('post.create');
    Route::post('post', 'PostsController@store')->name('post.store');
    Route::get('post/{post}', 'PostsController@show')->name('post.show');
    Route::get('post/{post}/edit', 'PostsController@edit')->name('post.edit')->middleware('isAdmin');
    Route::put('post/{post}', 'PostsController@update')->name('post.update')->middleware('isAdmin');
    Route::DELETE('post/{post}', 'PostsController@destroy')->name('post.destroy')->middleware('isAdmin');
    Route::get('/pending/post','PostsController@pending')->name('post.pending')->middleware('isAdmin');
    Route::put('/post/{id}/approve','PostsController@approval')->name('post.approve')->middleware('isAdmin');
    Route::put('/post/{id}/publish','PostsController@publish')->name('post.publish');

    Route::get('subscribe','SubscribeController@index')->name('subscribe.index')->middleware('isAdmin');
    Route::DELETE('subscribe/{subscribe}/delete','SubscribeController@destroy')->name('subscribe.destroy')->middleware('isAdmin');

});




// front section

Route::get('/', 'frontend\HomeController@index')->name('home');
Route::post('subscriber','frontend\SubscribeController@store')->name('subscribe.store');

