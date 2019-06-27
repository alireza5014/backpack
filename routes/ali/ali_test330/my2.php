<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/my2/list", "My2Controller@list");
    Route::post("{username}/{database_name}/my2/create", "My2Controller@create");
    Route::post("{username}/{database_name}/my2/modify", "My2Controller@modify");
    Route::post("{username}/{database_name}/my2/delete", "My2Controller@delete");


});


