<?php






Auth::routes();


Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reservation', 'HomeController@contact')->name('reservation');


Route::group(['prefix' => 'admin','namespace' => 'Admin' , 'middleware' => 'auth'], function () {
 Route::get('/dashboard','adminController@index' )->name('dashboard'); 
 
  
 Route::resource('item', 'itController');
 Route::resource('category', 'categoryController');
 Route::resource('slide', 'slideController');
 Route::resource('reserve', 'ReservationController');

});
 
