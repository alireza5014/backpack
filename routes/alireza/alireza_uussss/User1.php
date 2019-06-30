<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_uussss"], function () {Route::GET("{username}/{database_name}/user1/list", "User1Controller@list");  
Route::POST("{username}/{database_name}/user1/create", "User1Controller@create");  
Route::POST("{username}/{database_name}/user1/modify", "User1Controller@modify");  
Route::POST("{username}/{database_name}/user1/delete", "User1Controller@delete");  
});