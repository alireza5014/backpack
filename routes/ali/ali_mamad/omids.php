<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_mamad"], function () {

    Route::get("{username}/{database_name}/omid/list", "OmidController@list");
    Route::post("{username}/{database_name}/omid/create", "OmidController@create");
    Route::post("{username}/{database_name}/omid/modify", "OmidController@modify");
    Route::post("{username}/{database_name}/omid/delete", "OmidController@delete");


});


