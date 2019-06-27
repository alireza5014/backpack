<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/hhhh/list", "HhhhController@list");
    Route::post("{username}/{database_name}/hhhh/create", "HhhhController@create");
    Route::post("{username}/{database_name}/hhhh/modify", "HhhhController@modify");
    Route::post("{username}/{database_name}/hhhh/delete", "HhhhController@delete");


});


