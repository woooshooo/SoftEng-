<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Staffs;
use App\Profile;
use App\User;
class StaffsController extends Controller
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
      $staffs = Staffs::all();
      $title = 'View Staffs';
      return view('profile/viewstaffs')->with('title', $title)->with('staffs', $staffs)->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile/addstaff');
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
          'cluster' => 'required',
          'staff_pos' => 'required'
        ]);
      //update staff profile
      $profile = new Profile;
      $staff = new Staffs;
      $user = new User;
      $profile->firstname = $request->input('fname');
      $profile->middlename = $request->input('mname');
      $profile->lastname = $request->input('lname');
      $profile->email = $request->input('email');
      $profile->contactdetails = $request->input('contactdetails');
      $staff->cluster = $request->input('cluster');
      $staff->staff_pos = $request->input('staff_pos');
      $profile->save();
      $staff->profile_id = $profile->profile_id;
      $staff->save();
      $user->username = strtolower(substr($profile->firstname, 0, 1).$profile->lastname);
      $user->password = bcrypt(strtolower($profile->lastname));
      $user->staff_id = $profile->staff->staff_id;
      $user->save();
      return redirect('/staffs')->with('success','Staff Added!')->with('profile',$profile)->with('staff',$staff);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $staff = Profile::find($id)->staff;
      $profiles = Profile::find($id);
      $title = 'Staff';
      return View('profile/showstaff')->with('profiles', $profiles)->with('title',$title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $title = 'Edit Staff';
      $profiles = Profile::find($id);
      $staffs = Profile::find($id)->staff;
      return view('profile/editstaff')->with('profiles', $profiles)->with('staffs', $staffs)->with('title',$title);
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
          'cluster' => 'required',
          'staff_pos' => 'required'
        ]);
      //update Staff profile
      $profile= Profile::find($id);
      $staff = Profile::find($id)->staff;
      $profile->firstname = $request->input('fname');
      $profile->middlename = $request->input('mname');
      $profile->lastname = $request->input('lname');
      $profile->email = $request->input('email');
      $staff->cluster = $request->input('cluster');
      $staff->staff_pos = $request->input('staff_pos');
      $profile->save();
      $staff->save();

      return redirect('/staffs')->with('success','Staff Profile Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile= Profile::find($id);
        $staff = Profile::find($id)->staff;
        $user = User::find($staff->staff_id);
        //$user->delete();
        //$stafff->delete(); //maka bwisit ni ikapila ko nag balik2x ani zzzzzzzzz
        //$profile->delete();

        if ($staff->staff_status == 'INACTIVE') {
          $staff->staff_status = 'ACTIVE';
          $user->user_status = 'ACTIVE';
          $staff->save();
          $user->save();
        } else {
          $staff->staff_status = 'INACTIVE';
          $user->user_status = 'INACTIVE';
          $staff->save();
          $user->save();
        }
        return redirect('/staffs')->with('success','Staff Status Changed!');
    }
}
