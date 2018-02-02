<?php

namespace App\Http\Controllers;
use App\Borrow;
use App\Items;
use App\Profile;
use App\ItemDetails;
use App\BorrowDetails;
use DB;

use Illuminate\Http\Request;

class ItemDetailsController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $title = 'Viewing Equipment';
      $itemdetails = ItemDetails::find($id);
      $items = ItemDetails::find($id)->item;
      $borrowdetails = BorrowDetails::where('equipment_details_id',$itemdetails->equipment_details_id)->get();
      $borrows = Borrow::all();
      $profiles = Profile::all();

      return View('inventory/showitem')->with('title',$title)->with('itemdetails', $itemdetails)->with('borrows', $borrows)->with('borrowdetails',$borrowdetails)->with('profiles',$profiles)->with('items',$items);

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
