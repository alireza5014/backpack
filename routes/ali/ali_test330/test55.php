<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/test55/list", "Test55Controller@list");
    Route::post("{username}/{database_name}/test55/create", "Test55Controller@create");
    Route::post("{username}/{database_name}/test55/modify", "Test55Controller@modify");
    Route::post("{username}/{database_name}/test55/delete", "Test55Controller@delete");


});


