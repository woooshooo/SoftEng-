<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vols;
use App\Staffs;
use App\Profile;
use App\Events;
use App\ItemDetails;
use App\ProfileProjects;
use App\ProfileProjectsWorked;
use App\Projects;
use App\MilestoneProjects;
use App\FinishedMilestones;
use App\ItemsProject;
use DB;
class ProfileProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $id = $request->projects_id;
        $volcount = count($request->volunteers);
        for ($i=0; $i < $volcount; $i++) {
          $newpp = new ProfileProjects;
          $newpp->profile_id = $request->volunteers[$i];
          $newpp->projects_id = $id;
          $newpp->milestone_projects_id = $request->milestone[$i];
          $newpp->save();
        }
        return redirect('projects/'.$id)->with('success','Volunteers Assigned!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      // return $request;
      $project = Projects::find($id);
      $volcount = count($request->volunteers);
      for ($i=0; $i < $volcount; $i++) {
        $worked = ProfileProjects::where('projects_id',$id)->where('profile_id',$request->volunteers[$i])->first();
        $worked->status = "Worked";
        $worked->save();
      }
      $project->projects_status = "Finished";
      $project->save();
      return redirect('projects/'.$id)->with('success','Project Finished!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
