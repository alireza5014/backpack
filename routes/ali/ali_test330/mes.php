<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/mes/list", "MeController@list");
    Route::post("{username}/{database_name}/mes/create", "MeController@create");
    Route::post("{username}/{database_name}/mes/modify", "MeController@modify");
    Route::post("{username}/{database_name}/mes/delete", "MeController@delete");


});


