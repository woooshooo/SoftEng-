<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Vols;
use App\Staffs;
use App\Profile;
use App\Events;
use App\ProfileProjects;
use App\Projects;
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
        $projects = Projects::all();
        return view('projects/projects')->with('title', $title)->with('projects', $projects);
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
        $aw = count($request->cluster_name)-1;
          for ($num=$aw; $num >= 0 ; $num--) {
            $volunteers = Vols::where('cluster',$request->cluster_name[$num])->get();
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
      return view('projects/showproject')->with('title',$title)->with('projects',$projects);
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
