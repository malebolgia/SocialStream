<?php

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/social_stream/social_wall', 'Malacode\SocialStream\Http\Controllers\SocialWallAdminController');
});

// User routes for social_wall
Route::group(['prefix' => 'user'], function () {
    Route::resource('/social_stream/social_wall', 'Malacode\SocialStream\Http\Controllers\SocialWallUserController');
});

// Public routes for social_wall
Route::get('social_stream/social_wall', 'Malacode\SocialStream\Http\Controllers\SocialWallPublicController@index');
Route::get('social_stream/social_wall/{slug?}', 'Malacode\SocialStream\Http\Controllers\SocialWallPublicController@show');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/social_stream/social_wall_category', 'Malacode\SocialStream\Http\Controllers\SocialWallCategoryAdminController');
});

// User routes for social_wall_category
Route::group(['prefix' => 'user'], function () {
    Route::resource('/social_stream/social_wall_category', 'Malacode\SocialStream\Http\Controllers\SocialWallCategoryUserController');
});

// Public routes for social_wall_category
Route::get('social_stream/social_wall_category', 'Malacode\SocialStream\Http\Controllers\SocialWallCategoryPublicController@index');
Route::get('social_stream/social_wall_category/{slug?}', 'Malacode\SocialStream\Http\Controllers\SocialWallCategoryPublicController@show');
