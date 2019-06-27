<?php
 
Route::group(["prefix" => "", "namespace" => "All\ali\ali_test330"], function () {

    Route::get("{username}/{database_name}/ggghs/list", "GgghController@list");
    Route::post("{username}/{database_name}/ggghs/create", "GgghController@create");
    Route::post("{username}/{database_name}/ggghs/modify", "GgghController@modify");
    Route::post("{username}/{database_name}/ggghs/delete", "GgghController@delete");


});


