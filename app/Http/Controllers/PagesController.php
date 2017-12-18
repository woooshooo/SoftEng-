<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;

class PagesController extends BaseController
{
  public function index(){
    $title = 'Welcome to the Dashboard';
    //return view('dashboard', compact('title'));
    return view('dashboard')->with('title',$title);
  }
  public function addproject(){
    $title = 'Add Project';

    return view('projects/addproject')->with('title',$title);
  }
  public function viewproject(){

    return view('projects/projects')->with('title',$title);
  }
  public function additem(){
    return view('inventory/additem')->with('title',$title);
  }
  public function viewitem(){
    return view('inventory/viewitem')->with('title',$title);
  }
  public function borrowitem(){
    return view('inventory/borrowitem')->with('title',$title);
  }
  public function addvol(){
    $title = 'Add Volunteer';
    return view('profile/addvol')->with('title',$title);
  }
  public function addstaff(){
    return view('profile/addstaff')->with('title',$title);
  }
  public function viewvolunteer(){
    return view('profile/viewprof')->with('title',$title);
  }
  public function viewstaff(){
    return view('profile/viewstaffprof')->with('title',$title);
  }
  public function viewprofiles(){
    return view('profile/viewprof')->with('title',$title);
  }
  public function editvolunteer(){
    $title = 'Edit Volunteer';
    return view('profile/editvol')->with('title',$title);
  }
}

?>
