<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Items;
use App\Profile;
use DB;
class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Items::all();
      $borrows = Borrow::all();
      $avails = DB::select('select a.equipment_id,a.item_name, a.item_type, a.item_quantity, (a.item_quantity - sum(b.qtyBorrowed)) AS available, sum(b.qtyBorrowed) AS borrowed, a.item_notes
      from equipments a left join borrow b
      ON a.equipment_id = b.equipment_id group by a.equipment_id'); //returns the sum of qty borrowed
      $title = 'Borrow Equipments';
      return view('inventory/borrowitem')->with('title', $title)->with('items', $items)->with('borrows', $borrows)->with('avails', $avails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory/borrowitem');
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
          'borrower' => 'required',
          'item_name' => 'required',
          'qtyBorrowed' => 'required',
          'purpose' => 'required',
        ]);


        $count = count($request->item_name);
        for($num = $count; $num > 0; $num-- ){
          $borrows = new Borrow;
          $equipment = $request->item_name[$num-1];
          $borrows->qtyBorrowed = $request->qtyBorrowed[$num-1];
          $borrows->purpose = $request->input('purpose');
          $name = strtok($request->borrower," ");
          $profileDB = Profile::where('firstname', 'LIKE', '%'.$name.'%')->first()->profile_id;
          $borrows->profile_id = $profileDB;
          $itemDB = Items::where('item_name', $equipment)->first()->equipment_id;
          $borrows->equipment_id = $itemDB;
          $borrows->save();

      }

      return redirect('/borrows')->with('success','Equipment Borrowed!')->with('borrows',$borrows);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Borrowed Items';
        //$borrows = Profile::find($id)->borrow;
        //$profiles = Profile::where('profile_id', $id)->first()->firstname;
        $profiles = Profile::find($id);
        //$borrows = DB::table('borrow')->where('borrow.profile_id','=',$id)
        //->join('profiles', 'profiles.profile_id', '=', 'borrow.profile_id')
        //->join('equipments', 'equipments.equipment_id', '=', 'borrow.equipment_id')
        //->first();
        $borrows = DB::select('select profiles.profile_id as id, profiles.firstname as firstname, equipments.item_name as item_name, equipments.equipment_id as equipment_id, borrow.qtyBorrowed as qtyBorrowed, borrow.purpose as purpose, borrow.borrow_status as borrow_status, borrow.created_at as created_at, borrow.updated_at as updated_at from profiles
                            inner join borrow on profiles.profile_id = borrow.profile_id
                            inner join equipments on borrow.equipment_id = equipments.equipment_id');
        return view('inventory/viewborroweditem')->with('title',$title)->with('borrows',$borrows)->with('profiles',$profiles);


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
        $ret = Borrow::find($id);
        $ret->borrow_status = 'returned';
        $ret->save();
        return redirect("/items")->with('success','Item Returned');
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

    public function searchItem(Request $request)
    {
      $term = $request->term;
      $items = Items::where('item_name','LIKE','%'.$term.'%')->get();
      if ( count($items) == 0){
        $searchResult[] = 'Equipment not found.';
      } else {
        foreach ($items as $key => $value) {
          if ($value->item_status == "UNAVAILABLE") {
            $searchResult[] = $value->item_name + " not available for borrowing";
          } else {
            $searchResult[] = $value->item_name;
          }
        }
      }
      return $searchResult;

    }
    public function searchProfile(Request $request)
    {
      $term = $request->term;
      $profiles = Profile::where('firstname','LIKE','%'.$term.'%')
                          ->orWhere('lastname','LIKE','%'.$term.'%')
                          ->get();
      if ( count($profiles) == 0){
        $searchResult[] = 'Profile not found.';
      } else {
        foreach ($profiles as $key => $value) {
          $searchResult[] = $value->firstname . " " . $value->lastname;
        }
      }
      return $searchResult;

    }
}
