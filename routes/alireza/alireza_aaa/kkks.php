<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/kkks/list", "KkkController@list");
    Route::post("{username}/{database_name}/kkks/create", "KkkController@create");
    Route::post("{username}/{database_name}/kkks/modify", "KkkController@modify");
    Route::post("{username}/{database_name}/kkks/delete", "KkkController@delete");


});


