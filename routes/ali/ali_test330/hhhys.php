<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/hhhys/list", "HhhyController@list");
    Route::post("{username}/{database_name}/hhhys/create", "HhhyController@create");
    Route::post("{username}/{database_name}/hhhys/modify", "HhhyController@modify");
    Route::post("{username}/{database_name}/hhhys/delete", "HhhyController@delete");


});


