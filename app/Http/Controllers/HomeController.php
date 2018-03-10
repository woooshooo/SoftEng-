<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Projects;
use App\ProjectsRank;
use App\Events;
use App\EventsRank;
use App\Staffs;
use App\Vols;
use App\Profile;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $profiles = Profile::all();
      $projectscount = Projects::all()->count();
      $projectsfinished = count(Projects::where('projects_status','Finished')->get());
      $projectsprogress = sprintf('%0.0f', round(($projectsfinished/$projectscount)*100, 2));
      $eventscount = Events::all()->count();
      $eventsfinished = count(Events::where('events_status','Finished')->get());
      $eventsprogress = sprintf('%0.0f', round(($eventsfinished/$eventscount)*100, 2));
      $staffscount = Staffs::all()->count();
      $volscount = Vols::all()->count();
      $title = 'Rankings';
      $id = Auth::id();
      $user = Staffs::find($id)->profile;
      $projects = Projects::all();
      $events = Events::all();
      $currdate = new DateTime(); // Today's Date/Time
      $eventsrank = EventsRank::all();
      $projectsrank = ProjectsRank::all();
      return view('dashboard')->with(compact('projectscount','eventscount','staffscount','volscount','title','id','user','profiles','projects','events','currdate','eventsprogress','projectsprogress','eventsrank','projectsrank'));
    }
}
