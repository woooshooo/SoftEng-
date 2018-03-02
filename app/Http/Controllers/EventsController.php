<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Vols;
use App\Staffs;
use App\Profile;
use App\Events;
use App\ItemDetails;
use App\ProfileEvents;
use App\Projects;
use App\MilestoneEvents;
use App\FinishedMilestonesEvents;
use App\ItemsEvent;
use DB;
class EventsController extends Controller
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
      $title = 'View Events';
      $itemdetails = ItemDetails::all();
      $events = Events::all();
      $profileevents = ProfileEvents::all();
      $profiles = Profile::all();
      return view('events/events')->with('title', $title)->with('events', $events)->with('itemdetails',$itemdetails)->with('profiles', $profiles)->with('profileevents',$profileevents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events/addevents');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'events_name' => 'required',
            'events_details' => 'required',
            'events_startdate' => 'required',
            'events_deadline' => 'required',
            'events_status' => 'required',
        ]);
        $events = new Events;
        $events->events_name = $request->input('events_name');
        $events->events_details =$request->input('events_details');
        $events->events_startdate =$request->input('events_startdate');
        $events->events_deadline =$request->input('events_deadline');
        $events->events_status =$request->input('events_status');
        $events->save();

        return
        redirect('events/')->with('success','Added Event!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $title = 'Viewing Event';
      $events = Events::find($id);
      $startdate = strtotime($events->events_startdate);
      $enddate = strtotime($events->events_deadline);
      $currdate = strtotime(date("Y-m-d"));
      $totaldays = ($enddate-$startdate)/86400;
      $remainingdays = ($enddate-$currdate)/86400;
      $remainingdaystostart = ($startdate-$currdate)/86400;
      if ($remainingdays==0) {
        $progressExpected = 100;
      // } elseif($remainingdaystostart < $remainingdays) {
      //   $progressExpected = 0;
      } else {
        $progressExpected = sprintf('%0.0f', round(($remainingdays/$totaldays)*100, 1));
      }
      $profileevents = ProfileEvents::all();
      $profiles = Profile::all();
      $vols = Vols::all();
      // it just get the same equipment_details_id and the project id
      $eventitems = ItemsEvent::where('events_id',$id)->get();
      $itemdetails = ItemDetails::all();
      // return $events;
      $milestones = MilestoneEvents::where('events_id', $id)->get();
      $finished = FinishedMilestonesEvents::where('events_id', $id)->get();
      $getmilestones = count($milestones);
      $getfinished = count($finished);
      $progress;
      if($getmilestones == 0 || $getfinished == 0){
        $progress = 0;
      }
      else{
        $progress = sprintf('%0.0f', round(($getfinished/$getmilestones)*100, 2));
      }
      return view('events/showevents')->with('title',$title)->with('events',$events)->with('milestones', $milestones)->with('progress', $progress)->with('progressExpected', $progressExpected)->with('eventitems', $eventitems)->with('itemdetails',$itemdetails)->with('profiles',$profiles)->with('profileevents',$profileevents)->with('vols',$vols);
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
      $this->validate($request, [
          'events_name' => 'required',
          'events_details' => 'required',
          'events_startdate' => 'required',
          'events_deadline' => 'required',
          'events_status' => 'required',
      ]);
      $events = Events::find($id);
      $events->events_name = $request->input('events_name');
      $events->events_details =$request->input('events_details');
      $events->events_startdate =$request->input('events_startdate');
      $events->events_deadline =$request->input('events_deadline');
      $events->events_status =$request->input('events_status');
      $events->save();

      return
      redirect('events/'.$id)->with('success','Succesfully Updated!');
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
