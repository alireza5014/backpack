<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/abbbs/list", "AbbbController@list");
    Route::post("{username}/{database_name}/abbbs/create", "AbbbController@create");
    Route::post("{username}/{database_name}/abbbs/modify", "AbbbController@modify");
    Route::post("{username}/{database_name}/abbbs/delete", "AbbbController@delete");


});


