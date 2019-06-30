<?php
 
        Route::group(["prefix" => "", "namespace" => "All\alireza\alireza_ttts"], function () {Route::GET("{username}/{database_name}/ggfgt/list", "GgfgtController@list");  
Route::POST("{username}/{database_name}/ggfgt/create", "GgfgtController@create");  
Route::POST("{username}/{database_name}/ggfgt/modify", "GgfgtController@modify");  
Route::POST("{username}/{database_name}/ggfgt/delete", "GgfgtController@delete");  
});