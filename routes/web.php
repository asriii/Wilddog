<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'UserController@index'); 
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index')->name('dashboard');
        Route::get('/customer', 'admin\CustomerController@index')->name('customer');
        
    });
});
        
        Route::post('addCustomer', 'ApiController@addCustomer');
        Route::get('customers', 'ApiController@getAllCustomer');
        Route::get('getCustomer/{id}', 'ApiController@getCustomer');
        Route::post('updateCustomer/{id}', 'ApiController@updateCustomer');
        Route::get('deleteCustomer/{id}', 'ApiController@deleteCustomer');






