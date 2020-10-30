<?php


Route::get('home', function(){return redirect()->route('dashboard');});
Route::get('/', 'DashboardController@index')->middleware('auth')->name('dashboard');


Route::prefix('users')->middleware('auth')->group(function() {
	Route::get('', 'UserController@edit')->name('users.edit');
});

Route::prefix('collections')->middleware('auth')->group(function() {
    Route::get('', 'CollectionController@index')->name('collections.index');
});

Route::prefix('colors')->middleware('auth')->group(function() {
    Route::get('', 'ColorController@index')->name('colors.index');
});

Route::prefix('shapes')->middleware('auth')->group(function() {
    Route::get('', 'ShapeController@index')->name('shapes.index');
});

Route::prefix('fabrics')->middleware('auth')->group(function() {
    Route::get('', 'FabricController@index')->name('fabrics.index');
});

Route::prefix('references')->middleware('auth')->group(function() {
    Route::get('', 'ReferenceController@index')->name('references.index');
    Route::get('{reference}/edit', 'ReferenceController@edit')->name('references.edit');
    
});

Route::prefix('reference_categories')->middleware('auth')->group(function() {
    Route::get('', 'ReferenceCategoryController@index')->name('reference_categories.index');
});

Route::prefix('commands')->middleware('auth')->group(function() {
    Route::get('', 'CommandController@index')->name('commands.index');
    Route::get('{command}/edit', 'CommandController@edit')->name('commands.edit');
    Route::get('{command}/print', 'CommandController@print')->name('commands.print');
});