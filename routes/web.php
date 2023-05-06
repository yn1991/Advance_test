<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;


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

Route::get('/contact', 'App\Http\Controllers\ContactsController@index')->name('contact.index');
//確認フォームページ
Route::post('/contact/confirm', 'App\Http\Controllers\ContactsController@confirm')->name('contact.confirm');
//送信完了ページ
Route::post('/contact/thanks', 'App\Http\Controllers\ContactsController@send')->name('contact.send');
//管理システム
Route::get('/admin', 'App\Http\Controllers\ContactsController@admin')->name('contact.admin');
//管理検索システム
Route::get('/admin/find', 'App\Http\Controllers\ContactsController@find')->name('contact.find');
Route::post('/admin/find', 'App\Http\Controllers\ContactsController@search')->name('contact.search');