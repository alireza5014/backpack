<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_rtgzrgtdhghg"], function () {Route::GET("{username}/{database_name}/user/list", "UserController@list");  
Route::POST("{username}/{database_name}/user/create", "UserController@create");  
Route::POST("{username}/{database_name}/user/modify", "UserController@modify");  
Route::POST("{username}/{database_name}/user/delete", "UserController@delete");  
});