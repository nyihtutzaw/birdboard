<?php


Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post("/projects","ProjectController@store");
    Route::get("/projects/create","ProjectController@create");
    Route::get("/project/{project}","ProjectController@show");

    Route::post("/project/{project}/tasks","ProjectTaskController@store");

});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

