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
        //return $request;
         $this->validate($request, [
          'milestone_name' => 'required'
          //'milestone_status' => 'required'
        ]);
        #
        $count = count($request->milestone_name);
        $milestoneproject = new MilestoneProjects;
        #
        for($num=$count; $num > 0; $num--){
            $milestoneproject->projects_id = Projects::get($id);
            $milestoneproject->milestone_name = $request->milestone_name[$num-1];
            $milestoneproject->milestone_status = 'Ongoing';
            $milestoneproject->save();

        }
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
        $this->validate($request, [
          'milestone_name' => 'required',
          'milestone_status' => 'required'
        ]);

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
}
