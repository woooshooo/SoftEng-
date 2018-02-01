<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\BorrowProfile;
use App\BorrowDetails;
use App\Items;
use App\ItemDetails;
use App\Profile;
use DB;
use Carbon\Carbon;
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
      $title = 'Borrow Equipments';
      return view('inventory/borrowitem')->with('title', $title)->with('items', $items)->with('borrows', $borrows);
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
      //return $request;
      //validate
        $this->validate($request, [
          'dateborrowed' => 'required',
          'borrower' => 'required',
          'item_code'=> 'required',
          'item_name'=> 'required',
          'numberofdays'=> 'required',
          'purpose' => 'required'
        ]);

        $count = count($request->item_code);
        $borrows = new Borrow;
        $borrows->dateborrowed = $request->input('dateborrowed');
        $name = explode(' ',$request->input('borrower'));
        $borrows->profile_id = Profile::where('firstname','LIKE','%'.$name[0].'%')->first()->profile_id;
        $borrows->purpose = $request ->input('purpose');
        $borrows->save();
        $borrow_profile = new BorrowProfile;
        $borrow_profile->borrow_id = $borrows->borrow_id;
        $borrow_profile->profile_id = $borrows->profile_id;
        $borrow_profile->save();
        for($num = $count; $num > 0; $num-- ){
          $borrowdetails = new BorrowDetails;
          $borrowdetails->borrow_id = $borrows->borrow_id;
          $borrowdetails->equipment_details_id = ItemDetails::where('item_code',$request->item_code[$num-1])->value('equipment_details_id');
          $borrowdetails->numberofdays = $request->numberofdays[$num-1];
          $borrowdetails->save();
          $itemdetails = ItemDetails::where('item_code',$request->item_code[$num-1])->first();
          $itemdetails->item_status = 'BORROWED';
          $itemdetails->save();
        }

      return redirect('/items')->with('success','Equipment Borrowed!')->with('borrows',$borrows)->with('$orrowdetails',$borrowdetails);
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

        $return = Borrow::find($id)->borrowdetail->first();
        $item = Borrow::find($id)->itemdetails->first();
        $item->item_status = 'AVAILABLE';
        $return->returndate = date('Y-m-d');
        $return->save();
        $item->save();
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
      $items = ItemDetails::where('item_name','LIKE','%'.$term.'%')->get();
      if (count($items) == 0){
        $searchResult[] = 'Equipment not found.';
      } else {
        foreach ($items as $key => $value) {
          if ($value->item_status == "UNAVAILABLE") {
            $searchResult[] = "item not found";
          }
            $searchResult[] = $value->item_name;
        }
      }
      return $searchResult;

    }
    public function searchItemCode(Request $request)
    {
      $term = $request->term;
      $items = ItemDetails::where('item_code','LIKE','%'.$term.'%')->get();

        foreach ($items as $key => $value) {
            $searchResult[] = $value->item_code;
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
