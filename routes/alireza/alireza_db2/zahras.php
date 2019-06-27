<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_db2"], function () {

    Route::get("{username}/{database_name}/zahra/list", "ZahraController@list");
    Route::post("{username}/{database_name}/zahra/create", "ZahraController@create");
    Route::post("{username}/{database_name}/zahra/modify", "ZahraController@modify");
    Route::post("{username}/{database_name}/zahra/delete", "ZahraController@delete");


});


