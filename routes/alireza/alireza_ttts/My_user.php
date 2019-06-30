<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_ttts"], function () {Route::GET("{username}/{database_name}/my_user/list", "My_userController@list");  
Route::POST("{username}/{database_name}/my_user/create", "My_userController@create");  
Route::POST("{username}/{database_name}/my_user/modify", "My_userController@modify");  
Route::POST("{username}/{database_name}/my_user/delete", "My_userController@delete");  
});