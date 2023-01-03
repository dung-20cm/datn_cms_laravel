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
Route::group(['middleware' => 'checkLoginAdmin'], function (){
    Route::get('','HomeController@getHome')->name('get.home');
    Route::group(['prefix' => 'category'], function(){
        Route::get('','CategoryController@index')->name('category.index');
        Route::get('create','CategoryController@create')->name('category.create');
        Route::post('create','CategoryController@store');

        Route::get('update/{id}','CategoryController@edit')->name('category.update');
        Route::post('update/{id}','CategoryController@update');

        Route::get('active/{id}','CategoryController@active')->name('category.active');
        Route::get('hot/{id}','CategoryController@hot')->name('category.hot');
        Route::get('delete/{id}','CategoryController@delete')->name('category.delete');
    });

    Route::group(['prefix' => 'product'], function(){
        Route::get('','ProductController@index')->name('product.index');
        Route::get('create','ProductController@create')->name('product.create');
        Route::post('create','ProductController@store');

        Route::get('update/{id}','ProductController@edit')->name('product.update');
        Route::post('update/{id}','ProductController@update');

        Route::get('active/{id}','ProductController@active')->name('product.active');
        Route::get('hot/{id}','ProductController@hot')->name('product.hot');
        Route::get('delete/{id}','ProductController@delete')->name('product.delete');
    });
    Route::group(['prefix' => 'user'], function(){
        Route::get('','UserController@index')->name('user.index');
        Route::get('create','UserController@create')->name('user.create');
        Route::post('create','UserController@store');

        Route::get('update/{id}','UserController@edit')->name('user.update');
        Route::post('update/{id}','UserController@update');

        Route::get('delete/{id}','UserController@delete')->name('user.delete');
    });

    Route::group(['prefix' => 'dealer'], function(){
        Route::get('','DealerController@index')->name('dealer.index');
        Route::get('create','DealerController@create')->name('dealer.create');
        Route::post('create','DealerController@store');

        Route::get('update/{id}','DealerController@edit')->name('dealer.update');
        Route::post('update/{id}','DealerController@update');

        Route::get('delete/{id}','DealerController@delete')->name('dealer.delete');
    });

    Route::group(['prefix' => 'transaction'], function(){
        Route::get('','TransactionController@index')->name('transaction.index');

        Route::get('update/{id}','TransactionController@edit')->name('transaction.update');
        Route::post('update/{id}','TransactionController@update');

        Route::get('delete/{id}','TransactionController@delete')->name('transaction.delete');
    });

    Route::get('profile','TemplateController@getProfile');
    Route::get('logout','TemplateController@logout')->name('get.logout');
});
Route::get('login','TemplateController@getLogin')->name('get.login');
Route::post('login','TemplateController@postLogin');
