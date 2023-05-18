<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/relateproduct','ProductController@index')->name('relateproduct');
Route::get('relateproduct/{id}', 'ProductController@show');
Route::get('/header','ManufacturesController@index')->name('header');
Route::get('/resultmanu','resultmanuController@index')->name('resultmanu');