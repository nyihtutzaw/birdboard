<?php


Route::post("/projects","ProjectController@store");

Route::get("/projects","ProjectController@index");