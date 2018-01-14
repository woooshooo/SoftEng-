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
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    if (Auth::check()) {
      $title = "Login";
      return redirect('/home')->with('title',$title);
    } else {
      $title = "Login";
      return view('auth/login')->with('title',$title);
    }
});

Route::get('/home', 'PagesController@index');
Route::get('/addprojects','PagesController@addproject');
Route::get('/viewprojects','PagesController@viewproject');
Route::get('/addevents','PagesController@addevent');
Route::get('/viewevents','PagesController@viewevent');
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
Route::resource('/events','EventsController');
Route::resource('/projects','ProjectsController');
Auth::routes();
