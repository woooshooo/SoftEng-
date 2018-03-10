<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileProjectsWorked;
use App\Projects;
class ProfileProjectsWorkedController extends Controller
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
          $newpp = new ProfileProjectsWorked;
          $newpp->profile_id = $request->volunteers[$i];
          $newpp->projects_id = $id;
          $newpp->milestone_projects_id = $request->milestone[$i];
          $newpp->save();
        }
        $projects = Projects::find($id);
        $projects->projects_status = "Finished";
        $projects->save();
        return redirect('projects/'.$id)->with('success','Project Finished');
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
