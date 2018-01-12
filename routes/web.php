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

Route::get('/', function () {
    $title = "Login";
    return view('auth/login')->with('title',$title);
});

Route::get('/home', 'PagesController@index');
Route::get('/addprojects','PagesController@addproject');
Route::get('/viewprojects','PagesController@viewproject');
Route::get('/additem','PagesController@additem');
Route::get('/viewitem','PagesController@viewitem');
Route::get('/borrowitem','PagesController@borrowitem');
Route::get('/addstaff','PagesController@addstaff');
Route::get('/addvolunteer','PagesController@addvol');
Route::get('/viewvounteer','PagesController@viewvolunteer');
Route::get('/viewstaff','PagesController@viewstaff');
Route::resource('/vols','VolsController');
Route::resource('/staffs','StaffsController');
Route::resource('/items','ItemsController');
Route::resource('/borrows','BorrowsController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
