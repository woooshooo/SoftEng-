<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\MilestoneProjects;
use App\FinishedMilestones;

class MilestoneProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Add Milestone';
        return view('/projects/addmilestone')->with('title', $title);

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

         $this->validate($request, [
          'milestone_name' => 'required',
          'milestone_deadline' => 'required'
        ]);
        #declare
        $count = count($request->milestone_name);
        $id = Projects::where('projects_id',$request->projects_id)->value('projects_id');
        $projects = Projects::find($id);
        #loop
        for($num=0; $count > $num; $num++){
            $milestoneproject = new MilestoneProjects;
            $milestoneproject->projects_id = $id;
            $milestoneproject->milestone_name = $request->milestone_name[$num];
            if ($request->milestone_deadline[$num] >= $projects->projects_startdate && $request->milestone_deadline[$num] <= $projects->projects_deadline) {
              $milestoneproject->milestone_deadline = $request->milestone_deadline[$num];
              $milestoneproject->milestone_status = $request->milestone_status[$num];
              $milestoneproject->save();
            } else {
              return redirect('projects/'.$id)->with('error','Please Check Milestone Deadline');
            }


        }

        return redirect('projects/'.$id);
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
        //validate
        // $this->validate($request, [
        //   'milestone_name' => 'required',
        //   'milestone_status' => 'required'
        // ]);

        //update milestone Status
        $milestone = MilestoneProjects::find($id);
        if($milestone->milestone_status == 'Ongoing'){
          $milestone->milestone_status = 'Finsihed';
          $milestone->save();
        }
        else{
          $milestone->milestone_status = 'Ongoing';
          $milestone->save();
        }
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

    public function changeStatus($id){
      $milestone = MilestoneProjects::find($id);
      if ($milestone->milestone_status == "Ongoing") {
        $milestone->milestone_status = "Finished";
      } else {
        $milestone->milestone_status = "Ongoing";
      }
      $milestone->save();
      return $milestone;
    }
}
