<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Vols;
use App\Profile;
class VolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $profiles = Profile::all();
      $vols = Vols::all();
      $title = 'View Volunteers';
      return view('profile/index')->with('title', $title)->with('vols', $vols)->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile/addvol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate
        $this->validate($request, [
          'fname' => 'required',
          'lname' => 'required',
          'email' => 'required',
          'contactdetails' => 'required',
          'coursestrand' => 'required',
          'yearlvl' => 'required',
          'cluster' => 'required',
          'section' => 'required'
        ]);
      //create volunteer profile
      $profile = new Profile;
      $vol = new Vols;
      $profile->firstname = $request->input('fname');
      $profile->middlename = $request->input('mname');
      $profile->lastname = $request->input('lname');
      $profile->email = $request->input('email');
      $profile->contactdetails = $request->input('contactdetails');
      $vol->cluster = $request->input('cluster');
      $vol->yearlvl = $request->input('yearlvl');
      $vol->course = $request->input('coursestrand');
      $vol->section = $request->input('section');
      $profile->save();
      $vol->profile_id = $profile->profile_id;
      $vol->save();

      return redirect('/vols')->with('success','Volunteer Added!')->with('profile',$profile)->with('vol',$vol);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $profiles = Profile::find($id);
      $title = 'Volunteer';
      return View('profile/show')->with('profiles', $profiles)->with('title',$title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $title = 'Edit Volunteer';
      $profiles = Profile::find($id);
      $vols = Profile::find($id)->volunteer;
      return view('profile/editvol')->with('profiles', $profiles)->with('vols', $vols)->with('title',$title);
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
          'fname' => 'required',
          'lname' => 'required',
          'email' => 'required',
          'contactdetails' => 'required',
          'coursestrand' => 'required',
          'yearlvl' => 'required',
          'cluster' => 'required',
          'section' => 'required'
        ]);
      //update volunteer profile
      $profile= Profile::find($id);
      $vol = Profile::find($id)->volunteer;
      $profile->firstname = $request->input('fname');
      $profile->middlename = $request->input('mname');
      $profile->lastname = $request->input('lname');
      $profile->email = $request->input('email');
      $profile->contactdetails = $request->input('contactdetails');
      $vol->cluster = $request->input('cluster');
      $vol->yearlvl = $request->input('yearlvl');
      $vol->course = $request->input('coursestrand');
      $vol->section = $request->input('section');
      $profile->save();
      $vol->save();

      return redirect('/vols')->with('success','Volunteer Profile Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect('/vols')->with('success','Volunteer Profile Removed!');
    }
}
