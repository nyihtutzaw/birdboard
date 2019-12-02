<?php


Route::post("/projects","ProjectController@store");

Route::get("/projects","ProjectController@index");
Route::get("/projects/{project}","ProjectController@show");