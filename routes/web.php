<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*main*/
Route::get('/', ['as' => 'index', 'uses' => 'User\MainController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'User\MainController@about']);
Route::get('/new', ['as' => 'new', 'uses' => 'User\MainController@new']);
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'User\MainController@contacts']);

Route::get('/add_new_shelter', ['as' => 'add_new_shelter', 'uses' => 'Employee\ShelterController@create']);
Route::post('/send_form', ['as' => 'send_form', 'uses' => 'Employee\ShelterController@send_form']);



Route::get('/admin', 'Admin\DashboardController@dashboard')->name('admin.index');

Route::get('/admin/articles', 'Admin\ArticlesController@index')->name('admin.articles.index');

Route::get('/employee', 'Employee\EditController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//*
//*   admin routes
//*

//Route::resource('/admin/animalcategories', 'Admin\AnimalCategoriesController'); //make for example on lesson

Route::post('admin/{id}/active', ['uses' => 'Admin\SheltersController@toggleActive', 'as' => 'admin.']);

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@admin');
    Route::resource('/animalcategorys', 'Admin\AnimalCategoriesController');
    Route::resource('/animals', 'Admin\AnimalsController');
    Route::resource('/shelters', 'Admin\SheltersController');
    Route::resource('/novelties', 'Admin\NoveltiesController');
    Route::resource('/users', 'Admin\UsersController');
});