<?php
// 画像のアップロードに関するルーティング
Route::get('/upload', 'ImagesController@upload')->name('contents.upload');
Route::post('/upload', 'ImagesController@uploadImage')->name('contents.uploadImage');
// ブログに必要なルーティング
Route::get('/search', 'ContentsController@search')->name('contents.search');
Route::get('/', 'ContentsController@index')->name('contents.index');
Route::get('/{id}', 'ContentsController@show')->name('contents.show');
