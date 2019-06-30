<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_test"], function () {Route::GET("{username}/{database_name}/post/list", "PostController@list");  
Route::POST("{username}/{database_name}/post/create", "PostController@create");  
Route::POST("{username}/{database_name}/post/modify", "PostController@modify");  
Route::POST("{username}/{database_name}/post/delete", "PostController@delete");  
});