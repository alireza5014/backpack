<?php
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@home')->name('home');

});




Route::post('token_request', 'SiteController@token_request')->name('token_request');

Route::post('site/register', 'SiteController@register')->name('site_register');
Route::post('site/login', 'SiteController@login')->name('site_login');



Route::any('telegram/action', 'Telegram\TelegramController@action')->name('action');






Route::group(['prefix' => '/admin'], function () {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');


    Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {


        /////// telegram

        Route::get('/web_hook/edit', 'Admin\TelegramController@edit_web_hook')->name('web_hook.edit');
        Route::get('/web_hook/modify}', 'Admin\TelegramController@modify_web_hook')->name('web_hook.modify');


        ////// end telegram


        Route::get('/home/1', 'AdminController@index')->name('admin.home');
        Route::get('/home', 'AdminController@index')->name('admin.dashboard');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');


        Route::get('/profile', 'AdminController@profile')->name('admin.profile');
        Route::post('/modify_profile', 'AdminController@modify_profile')->name('admin.modify.profile');


//            Route::get('/', 'AdminController@index')->name('home')->middleware('can:dashboard');
        Route::get('/getLogout', 'AdminController@getLogout')->name('admin.getLogout');
        Route::get('/setting', 'AdminController@setting')->name('admin.setting');


        Route::get('/user/new', 'UserController@new')->name('user.new');




        Route::get('/user/list', 'UserController@list')->name('user.list');
        Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');

        Route::post('/user/create', 'UserController@create')->name('user.create');
        Route::post('/user/modify', 'UserController@modify')->name('user.modify');



    });


});



Route::group(['prefix' => '/user'], function () {

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'Auth\LoginController@login')->name('user.login.submit');
    Route::get('logout/', 'Auth\LoginController@logout')->name('user.logout');


    Route::group(['middleware' => 'auth:user', 'namespace' => 'User'], function () {

        Route::get('/home', 'HomeController@home')->name('user.home');

        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::post('/modify/profile', 'UserController@modify_profile')->name('user.modify.profile');

        Route::get('/getLogout', 'UserController@getLogout')->name('user.getLogout');






        Route::get('/database/list', 'DatabaseController@list')->name('user.database.list');



        Route::post('/database/create', 'DatabaseController@create')->name('user.database.create');
        Route::post('/database/modify', 'DatabaseController@modify')->name('user.database.modify');




        Route::get('/table/new', 'TableController@new')->name('user.table.new');
        Route::get('/table/list', 'TableController@list')->name('user.table.list');
        Route::post('/table/create', 'TableController@create')->name('user.table.create');
        Route::post('/table/modify', 'TableController@modify')->name('user.table.modify');




        Route::get('/url/list', 'UrlController@list')->name('user.url.list');



    });


});



Route::auth();





