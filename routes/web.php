<?php
Route::get('/search', 'ContentsController@search')->name('contents.search');
Route::get('/', 'ContentsController@index')->name('contents.index');
Route::get('/{id}', 'ContentsController@show')->name('contents.show');