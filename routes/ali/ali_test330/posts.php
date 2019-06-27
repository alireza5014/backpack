<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/post/list", "PostController@list");
    Route::post("{username}/{database_name}/post/create", "PostController@create");
    Route::post("{username}/{database_name}/post/modify", "PostController@modify");
    Route::post("{username}/{database_name}/post/delete", "PostController@delete");


});


