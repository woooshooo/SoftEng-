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
Route::get('/test', function () {
      return view('text');
    }
);
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
Route::get('/viewborroweditem','PagesController@viewborroweditem');
Route::post('/addborroweditem','BorrowsController@store');
Route::resource('/vols','VolsController');
Route::resource('/staffs','StaffsController');
Route::resource('/items','ItemsController');
Route::get('searchItem','BorrowsController@searchItem');
Route::get('searchItemType','BorrowsController@searchItemType');
Route::get('searchItemCode','BorrowsController@searchItemCode');
Route::get('searchProfile','BorrowsController@searchProfile');
Route::resource('/borrows','BorrowsController');
Route::resource('/events','EventsController');
Route::resource('/projects','ProjectsController');
Route::resource('/itemdetails','ItemDetailsController');
Route::get('getItemName/{id}','ItemsController@getItemName');
Route::get('reports','ReportsController@index');
Auth::routes();
Route::resource('/addmilestone','MilestoneProjectsController');
Route::get('/finishedprojects/{id}', 'ProjectsController@destroy');
