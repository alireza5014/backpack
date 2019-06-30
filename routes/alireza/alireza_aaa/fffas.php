<?php
 
Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {

    Route::get("{username}/{database_name}/fffa/list", "FffaController@list");
    Route::post("{username}/{database_name}/fffas/create", "FffaController@create");
    Route::post("{username}/{database_name}/fffas/modify", "FffaController@modify");
    Route::post("{username}/{database_name}/fffas/delete", "FffaController@delete");


});


