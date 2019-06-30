<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/ww/list", "WwController@list");
    Route::post("{username}/{database_name}/ww/create", "WwController@create");
    Route::post("{username}/{database_name}/ww/modify", "WwController@modify");
    Route::post("{username}/{database_name}/ww/delete", "WwController@delete");


});


