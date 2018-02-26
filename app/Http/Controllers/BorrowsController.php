<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\BorrowProfile;
use App\BorrowDetails;
use App\Items;
use App\ItemType;
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
     public function __construct()
     {
         $this->middleware('auth');
     }
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
       // return $request;
       //validate
         $this->validate($request, [
           'dateborrowed' => 'required',
           'borrower' => 'required',
           'item_code'=> 'required',
           'item_name'=> 'required',
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
           if (is_null($request->quantity_borrowed)) {
             $borrowdetails->quantity_borrowed = 1;
           } else {
             $borrowdetails->quantity_borrowed = $request->quantity_borrowed[$num-1];
           }
           $borrowdetails->numberofdays = $request->numberofdays[$num-1];
           $itemdetails = ItemDetails::where('item_code',$request->item_code[$num-1])->first();
           if ($itemdetails->item_quantity == 1) {
             $itemdetails->item_status = "BORROWED";
           } 
           $itemdetails->save();
           $borrowdetails->save();
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
        $title = 'Borrow Form';
        $borrows = Borrow::find($id);
        $borrowdetails = Borrow::find($id)->borrowdetail;
        $itemdetails = ItemDetails::all();
        $profiles = Profile::where('profile_id',$borrows->profile_id)->get();

        return view('inventory/viewborroweditem')->with('title',$title)->with('borrows',$borrows)->with('borrowdetails',$borrowdetails)->with('itemdetails',$itemdetails)->with('profiles',$profiles);


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
     $returndate = Borrow::find($id);
     $returndate->returndate = date('Y-m-d');
     $returndate->save();
     $return = Borrow::find($id)->borrowdetail;
     $count = count($return);
     foreach ($return as $key => $value) {
       $rid = $return[$key]->borrow_details_id;
       $bd = BorrowDetails::find($rid);
       $bid = BorrowDetails::find($rid)->equipment_details_id;
       $qtyBorrowed = BorrowDetails::find($rid)->quantity_borrowed;
       $items = ItemDetails::find($bid);
       if ($items->item_quantity != 1) {
         // $items->item_quantity = $items->item_quantity + $qtyBorrowed;
       } else {
         $items->item_status = "AVAILABLE";
       }
       $items->item_desc = $request->item_desc[$key];
       --$count;
       $items->save();
     }
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
          if ($value->item_status == "AVAILABLE") {
            $searchResult[] = $value->item_name;
          }
        }
      }
      return $searchResult;

    }
    public function searchItemType(Request $request){
      $term = $request->term;
      $items = ItemType::where('item_type','LIKE','%'.$term.'%')->get();
      foreach ($items as $value) {
        $searchResult[] = $value->item_type;
      }
      return $searchResult;
    }


    public function searchItemCode(Request $request){
      $term = $request->term;
      $items = ItemDetails::where('item_code','LIKE','%'.$term.'%')->get();
      foreach ($items as $key => $value) {
        if ($value->item_status == "AVAILABLE") {
          $searchResult[] = $value->item_code;
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
