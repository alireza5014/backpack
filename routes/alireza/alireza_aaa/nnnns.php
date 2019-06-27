<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/nnnn/list", "NnnnController@list");
    Route::post("{username}/{database_name}/nnnn/create", "NnnnController@create");
    Route::post("{username}/{database_name}/nnnn/modify", "NnnnController@modify");
    Route::post("{username}/{database_name}/nnnn/delete", "NnnnController@delete");


});


