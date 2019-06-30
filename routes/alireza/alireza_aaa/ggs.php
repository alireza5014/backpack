<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/gg/list", "GgController@list");
    Route::post("{username}/{database_name}/gg/create", "GgController@create");
    Route::post("{username}/{database_name}/gg/modify", "GgController@modify");
    Route::post("{username}/{database_name}/gg/delete", "GgController@delete");


});


