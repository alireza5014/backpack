<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/aaas/list", "AaaController@list");
    Route::post("{username}/{database_name}/aaas/create", "AaaController@create");
    Route::post("{username}/{database_name}/aaas/modify", "AaaController@modify");
    Route::post("{username}/{database_name}/aaas/delete", "AaaController@delete");


});


