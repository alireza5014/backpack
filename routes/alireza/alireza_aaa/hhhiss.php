<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_aaa"], function () {Route::GET("{username}/{database_name}/hhhis/list", "HhhisController@list");  
Route::POST("{username}/{database_name}/hhhis/create", "HhhisController@create");  
Route::POST("{username}/{database_name}/hhhis/modify", "HhhisController@modify");  
Route::POST("{username}/{database_name}/hhhis/delete", "HhhisController@delete");  
});