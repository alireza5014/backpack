<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_db_10"], function () {

    Route::get("{username}/{database_name}/samira/list", "SamiraController@list");
    Route::post("{username}/{database_name}/samira/create", "SamiraController@create");
    Route::post("{username}/{database_name}/samira/modify", "SamiraController@modify");
    Route::post("{username}/{database_name}/samira/delete", "SamiraController@delete");


});


