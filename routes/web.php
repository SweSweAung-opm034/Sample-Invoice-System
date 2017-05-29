<?php

Route::get('/index', 'ItemsController@index');
Route::get('/invoice', 'InvoiceController@show');
Route::get('/del/{id}', 'InvoiceController@del');
Route::get('/edit/{id}', 'InvoiceController@edit');
Route::get('/pdfview/{id}','ItemsController@pdfview');

Route::post('/create', 'ItemsController@create');
Route::post('/invoice','InvoiceController@autoSearch');
Route::post('/update','InvoiceController@update');
