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
      $title = 'View Equipments';
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

      $borrows = new Borrow;
      $profile = $request->input('borrower');
      $equipment = $request->input('item_name');
      $borrows->qtyBorrowed = $request->input('qtyBorrowed');
      $borrows->purpose = $request->input('purpose');
      $profileDB = Profile::where('firstname', $profile)->first()->profile_id;
      $borrows->profile_id = $profileDB;
      $itemDB = Items::where('item_name', $equipment)->first()->equipment_id;
      $borrows->equipment_id = $itemDB;
      $borrows->save();

      return redirect('/borrows')->with('success','Borrow Form Added!')->with('borrows',$borrows);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "shit";
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
