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
  public function __construct()
  {
      $this->middleware('auth');
  }
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

    $title = 'View Project';

    return view('projects/projects')->with('title',$title);
  }
  public function additem(){
    $title = 'Add Item';
    return view('inventory/additem')->with('title',$title);
  }
  public function viewitem(){
    $title = 'View Item';
    return view('inventory/viewitem')->with('title',$title);
  }
  public function borrowitem(){
    $title = 'Borrow Item';
    return view('inventory/borrowitem')->with('title',$title);
  }
  public function addvol(){
    $title = 'Add Volunteer';
    return view('profile/addvol')->with('title',$title);
  }
  public function addstaff(){
    $title = 'Add Staff';
    return view('profile/addstaff')->with('title',$title);
  }
  public function viewvolunteer(){
    $title = 'View Volunteer';
    return view('profile/viewprof')->with('title',$title);
  }
  public function viewstaff(){
    $title = 'View Staff';
    return view('profile/viewstaffprof')->with('title',$title);
  }
  public function viewprofiles(){
    $title = 'View Profile';
    return view('profile/viewprof')->with('title',$title);
  }
  public function editvolunteer(){
    $title = 'Edit Volunteer';
    return view('profile/editvol')->with('title',$title);
  }
}

?>
