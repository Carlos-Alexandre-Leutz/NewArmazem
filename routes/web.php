<?php

// Front
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nova-home', 'HomeController@newIndex')->name('new.index');
Route::get('/categoria/{category}', 'HomeController@index')->name('category.index');
Route::get('/produtos/{category}', 'HomeController@products')->name('category.products');
Route::get('/produto/{code}', 'HomeController@product')->name('products.show');
Route::post('/send-budget', 'HomeController@budget')->name('budget.send');
Route::post('/send-form', 'HomeController@contact')->name('contact.send');
Route::get('/carrinho/orcamentos', 'CartController@budgets')->name('cart.budgets');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.categories');
Route::get('/admin/banner', 'AdminController@banner')->name('admin.banners');
Route::post('/admin/banner/salvar', 'AdminController@bannerSave')->name('admin.banners.save');

Route::post('/admin/categorias/{category}/imagem', 'AdminController@categoryImage')->name('admin.categories.images');
Route::match(['GET', 'POST'], '/admin/categorias/{category}/remover', 'AdminController@categoryRemove')->name('admin.categories.remove');

Route::match(['GET', 'POST'], '/admin/produtos/{category}/remover', 'AdminController@productRemove')->name('admin.products.remove');
Route::get('/admin/produtos/{category}', 'AdminController@categoryProducts');
Route::get('/admin/produtos/{category}/novo', 'AdminController@productNew')->name('producst.new');
Route::get('/admin/produtos/{code}/editar', 'AdminController@productEdit')->name('products.edit');
Route::post('/admin/produtos/salvar', 'AdminController@productSave')->name('products.save');

Route::get('/admin/categorias/nova', 'AdminController@categoryNew')->name('category.new');
Route::get('/admin/categorias/{code}/editar', 'AdminController@categoryEdit')->name('category.edit');
Route::post('/admin/categorias/salvar', 'AdminController@categorySave')->name('category.save');
Route::get('/admin/subcategorias/{code}', 'AdminController@index')->name('subcategories.index');




