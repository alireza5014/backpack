<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/ttt/list", "TttController@list");
    Route::post("{username}/{database_name}/ttt/create", "TttController@create");
    Route::post("{username}/{database_name}/ttt/modify", "TttController@modify");
    Route::post("{username}/{database_name}/ttt/delete", "TttController@delete");


});


