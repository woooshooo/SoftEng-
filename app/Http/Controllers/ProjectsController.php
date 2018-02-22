<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Vols;
use App\Staffs;
use App\Profile;
use App\Events;
use App\ItemDetails;
use App\ProfileProjects;
use App\Projects;
use App\MilestoneProjects;
use App\FinishedMilestones;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $title = 'View Projects';
        $itemdetails = ItemDetails::all();
        $projects = Projects::all();
        return view('projects/projects')->with('title', $title)->with('projects', $projects)->with('itemdetails',$itemdetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/addproject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->cluster_name[0];
      // $vols = Vols::all();
      // return Vols::where('cluster',$request->cluster_name[0])->get();
      //validate
        $this->validate($request, [
          'project_name' => 'required',
          'client_name' => 'required',
          'cluster_name' => 'required',
          'project_details' => 'required',
          'project_startdate' => 'required',
          'project_deadline' => 'required',
          'project_status' => 'required'
        ]);


        #
        $projects = new Projects;
        #
        $projects->projects_name = $request->input('project_name');
        $projects->projects_client = $request->input('client_name');
        $projects->projects_details = $request->input('project_details');
        $projects->projects_startdate = $request->input('project_startdate');
        $projects->projects_deadline = $request->input('project_deadline');
        $projects->projects_status = $request->input('project_status');
        $projects->save();
        #
        #
        $count = count($request->cluster_name); //2
          for ($i=0; $count > $i ; $i++) {

            $volunteers = Vols::where('cluster',$request->cluster_name[$i])->get();
            foreach ($volunteers as $value) {
              $profileprojects = new ProfileProjects;
              $profileprojects->projects_id = $projects->projects_id;
              $profileprojects->profile_id = $value->profile_id;
              $profileprojects->save();
          }
        }
        #



        return redirect('/projects')->with('success','Added Project!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $title = 'Viewing Project';
      $projects = Projects::find($id);
      $milestones = MilestoneProjects::where('projects_id', $id)->get();
      $finished = FinishedMilestones::where('projects_id', $id)->get();
      $getmilestones = count($milestones);
      $getfinished = count($finished);
      $progress;
      if($getmilestones == 0 || $getfinished == 0){
        $progress = 0;
      }
      else{
        $progress = ($getfinished/$getmilestones)*100;
      }
      //$mstatus = MilestoneProjects::where('milestone_status', 'Finished');
      return view('projects/showproject')->with('title',$title)->with('projects',$projects)->with('milestones', $milestones)->with('progress', $progress);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $title = 'Viewing Project';
      $projects = Projects::find($id);
      return view('projects/editprojects')->with('title',$title)->with('projects',$projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $vols = Vols::all();
      #Vols::where('cluster',$request->cluster_name[1])->get();
      //validate
        $this->validate($request, [
          'project_name' => 'required',
          'client_name' => 'required',
          'cluster_name' => 'required',
          'project_details' => 'required',
          'project_startdate' => 'required',
          'project_deadline' => 'required',
          'project_status' => 'required'
        ]);


        #
        $projects = Projects::find($id);
        #
        $projects->projects_name = $request->input('project_name');
        $projects->projects_client = $request->input('client_name');
        $projects->projects_details = $request->input('project_details');
        $projects->projects_startdate = $request->input('project_startdate');
        $projects->projects_deadline = $request->input('project_deadline');
        $projects->projects_status = $request->input('project_status');
        $projects->save();
        #
        #

        $profileprojects = ProfileProjects::all();
        foreach ($profileprojects as $value) {
          $value->delete();
        }

        $count = count($request->cluster_name); //2
          for ($i=0; $count > $i ; $i++) {

            $volunteers = Vols::where('cluster',$request->cluster_name[$i])->get();
            foreach ($volunteers as $value) {
              $profileprojects = new ProfileProjects;
              $profileprojects->projects_id = $projects->projects_id;
              $profileprojects->profile_id = $value->profile_id;
              $profileprojects->save();
          }
        }
        #



        return redirect('projects/'.$id)->with('success','Edited Project!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $title = 'Finish Project';
      $projects = Projects::find($id);
      $profileprojects = ProfileProjects::where('projects_id', $id)->get();
      return view('projects/finishedproject')->with('projects', $projects)->with('profileprojects', $profileprojects)->with('title', $title);
    }
}
