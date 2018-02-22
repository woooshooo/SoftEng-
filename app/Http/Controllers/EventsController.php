<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Vols;
use App\Staffs;
use App\Profile;
use App\Events;
use App\ProfileEvents;
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
      $profiles = Profile::all();
      $events = Events::all();
      $title = 'View Events';
      return view('events/events')->with('title', $title)->with('events', $events)->with('profiles', $profiles);
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
            'event_name' => 'required',
            'client_name' => 'required',
            'event_details' => 'required',
            'event_startdate' => 'required',
            'event_deadline' => 'required',
            'event_status' => 'required',
        ]);

        $events = new Event;
        $events->events_name =
        $request->input('event_name');
        $events->events_clients =
        $request->input('client_name');
        $events->events_details =
        $request->input('event_details');
        $events->events_startdate =
        $request->input('event_startdate');
        $events->events_deadline =
        $request->input('event_deadline');
        $events->events_status =
        $request->input('event_status');
        $events->save();

        $count = count($request->cluster_name);

        for($i=0; $count > $i; $i++){

          $volunteers =
          Vols::where('cluster',$request->cluster_name[$i])->get();
          foreach($volunteers as $value){
            $profileevents = new ProfileEvents;
            $profileevents->events_id = $events->events_id;
            $profileevents->profile_id = $value->profile_id;
            $profileevents->save();
          }
        }
        #

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
}
