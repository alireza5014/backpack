<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_ttts"], function () {Route::GET("{username}/{database_name}/sfASF/list", "SfASFController@list");  
Route::POST("{username}/{database_name}/sfASF/create", "SfASFController@create");  
Route::POST("{username}/{database_name}/sfASF/modify", "SfASFController@modify");  
Route::POST("{username}/{database_name}/sfASF/delete", "SfASFController@delete");  
});