<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/kkk/list", "KkkController@list");
    Route::post("{username}/{database_name}/kkk/create", "KkkController@create");
    Route::post("{username}/{database_name}/kkk/modify", "KkkController@modify");
    Route::post("{username}/{database_name}/kkk/delete", "KkkController@delete");


});


