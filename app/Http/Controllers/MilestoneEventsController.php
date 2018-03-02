<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\MilestoneEvents;
use App\FinishedMilestonesEvents;
class MilestoneEventsController extends Controller
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
       $this->validate($request, [
        'milestone_name' => 'required'
      ]);
      #declare
      $count = count($request->milestone_name);
      $id = Events::where('events_id',$request->events_id)->value('events_id');
      #loop
      for($num=0; $count > $num; $num++){
          $milestoneevent = new MilestoneEvents;
          $milestoneevent->events_id = $id;
          $milestoneevent->milestone_name = $request->milestone_name[$num];
          $milestoneevent->milestone_status = $request->milestone_status[$num];
          $milestoneevent->save();
      }

      return redirect('events/'.$id);
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
        //
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
      return $milestone = MilestoneEvents::find($id);
      if ($milestone->milestone_status == "Ongoing") {
        $milestone->milestone_status = "Finished";
        $milestone->save();
      } else {
        $milestone->milestone_status = "Ongoing";
      }
      $milestone->save();
      return $milestone;
    }
}
