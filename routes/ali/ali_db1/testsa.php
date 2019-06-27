<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_db1"], function () {

    Route::get("{username}/{database_name}/testsa/list", "TestsaController@list");
    Route::post("{username}/{database_name}/testsa/create", "TestsaController@create");
    Route::post("{username}/{database_name}/testsa/modify", "TestsaController@modify");
    Route::post("{username}/{database_name}/testsa/delete", "TestsaController@delete");


});


