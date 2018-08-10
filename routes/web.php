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

/*
# pasar parametros a la vista
Route::get('users/{id}/{name}', function($id, $name){
    return 'This is user id: '. $id.' And his name is: '. $name;
});

Route::get('/', function () {
    return view('welcome');
});

*/

# PAGES ROUTES
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

# crear todas las rutas necesarias
Route::resource('posts', 'PostsController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
