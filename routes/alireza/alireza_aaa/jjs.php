<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/jjs/list", "JjController@list");
    Route::post("{username}/{database_name}/jjs/create", "JjController@create");
    Route::post("{username}/{database_name}/jjs/modify", "JjController@modify");
    Route::post("{username}/{database_name}/jjs/delete", "JjController@delete");


});


