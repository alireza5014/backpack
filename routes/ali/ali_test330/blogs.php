<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/blog/list", "BlogController@list");
    Route::post("{username}/{database_name}/blog/create", "BlogController@create");
    Route::post("{username}/{database_name}/blogs/modify", "BlogController@modify");
    Route::post("{username}/{database_name}/blogs/delete", "BlogController@delete");


});


