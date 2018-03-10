<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileEventsWorked;
use App\Events;
class ProfileEventsWorkedController extends Controller
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
      //return $request;

      $id = $request->events_id;
      $volcount = count($request->volunteers);

      for ($i=0; $i < $volcount; $i++) {
        $newpe = new ProfileEventsWorked;
        $newpe->profile_id = $request->volunteers[$i];
        $newpe->events_id = $id;
        if ($request->eventphase[$i] == 1) {
          $newpe->pre_setup = true;
          $newpe->actual_event = false;
          $newpe->pack_up = false;
        }
        if ($request->eventphase[$i] == 2) {
          $newpe->pre_setup = false;
          $newpe->actual_event = true;
          $newpe->pack_up = false;
        }
        if ($request->eventphase[$i] == 3) {
          $newpe->pre_setup = false;
          $newpe->actual_event = false;
          $newpe->pack_up = true;
        }
        if ($request->eventphase[$i] == 4) {
          $newpe->pre_setup = true;
          $newpe->actual_event = false;
          $newpe->pack_up = true;
        }
        if ($request->eventphase[$i] == 5) {
          $newpe->pre_setup = false;
          $newpe->actual_event = true;
          $newpe->pack_up = true;
        }
        if ($request->eventphase[$i] == 6) {
          $newpe->pre_setup = true;
          $newpe->actual_event = true;
          $newpe->pack_up = true;
        }
        $newpe->save();
      }
      $event = Events::find($id);
      $event->events_status = "Finished";
      $event->save();
      return redirect('events/'.$id)->with('success','Event Finished');
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
