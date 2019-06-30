<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_test"], function () {Route::GET("{username}/{database_name}/category/list", "CategoryController@list");  
Route::POST("{username}/{database_name}/category/create", "CategoryController@create");  
Route::POST("{username}/{database_name}/category/modify", "CategoryController@modify");  
Route::POST("{username}/{database_name}/category/delete", "CategoryController@delete");  
});