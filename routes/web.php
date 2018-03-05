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
Route::get('/home', 'HomeController@index');
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
Route::resource('/itemsproject','ItemsProjectController');
Route::resource('/itemsevent','ItemsEventController');
Route::resource('/profileprojects','ProfileProjectsController');
Route::resource('/profileevents','ProfileEventsController');
Route::get('getItemName/{id}','ItemsController@getItemName');
Route::get('changeMilestoneStatus/{id}','MilestoneProjectsController@changeStatus'); // change milestone status projects
Route::get('changeMilestoneStatusE/{id}','MilestoneEventsController@changeStatus'); // change milestone status events
Route::get('reports','ReportsController@index');
Route::get('streampdf','ReportsController@streampdf');
Auth::routes();
Route::resource('/addmilestone','MilestoneProjectsController');
Route::resource('/addeventmilestone','MilestoneEventsController');
Route::get('/finishedprojects/{id}', 'ProjectsController@destroy');
Route::get('/showevents/{id}');
