<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Borrow;
use App\Items;
use App\Profile;
use App\Staffs;
use App\ItemDetails;
use App\BorrowDetails;
use App\sumofBorrowed;
use DB;
class ItemsController extends Controller
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
        $items = Items::all();
        $itemdetails = ItemDetails::all();
        $forBorrows = ItemDetails::all();
        $borrows = Borrow::all();
        $borrowed = DB::select('select borrow.borrow_id, borrow.dateborrowed, borrow.purpose, borrow.profile_id, borrow.returndate, PROFILES.firstname, PROFILES.lastname, equipment_details.* FROM equipment_details INNER JOIN borrow_details ON borrow_details.equipment_details_id = equipment_details.equipment_details_id INNER JOIN borrow ON borrow.borrow_id = borrow_details.borrow_id INNER JOIN profiles ON profiles.profile_id = borrow.profile_id');
        $profiles = Profile::all();
        $title = 'View Equipments';
        $sum = DB::select('select equipment_details_id, item_name, sum(quantity_borrowed) as sumOf from sumofBorrowed group by equipment_details_id');
        return view('inventory/index')->with('title', $title)->with('items', $items)->with('borrows', $borrows)->with('borrowed',$borrowed)->with('itemdetails',$itemdetails)->with('profiles',$profiles)->with('sum',$sum)->with('forBorrows',$forBorrows);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory/additem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id = Auth::id();
      $user = Staffs::find($id)->profile;
      //validate
        $this->validate($request, [
          'dateordered' => 'required',
          'datedelivered' => 'required',
          'receivedby' => 'required',
          'item_name' => 'required',
          'item_type' => 'required',
          'item_code' => 'required'
        ]);

          $count = count($request->item_name);
          $items = new Items;
          $items->dateordered = $request->input('dateordered');
          $items->datedelivered = $request->input('datedelivered');
          $items->receivedby = $request->input('receivedby');
          $items->encodedby = $user->firstname." ".$user->lastname; #<--- returns authenticated user
          $items->save();
        for($num = $count; $num > 0; $num-- ){
          $itemdetails = new ItemDetails;
          $itemdetails->equipment_id = $items->equipment_id;
          $itemdetails->item_name = $request->item_name[$num-1];
          $itemdetails->item_type = $request->item_type[$num-1];
          $itemdetails->item_code = $request->item_code[$num-1];
          $itemdetails->item_quantity = $request->item_quantity[$num-1];
          $itemdetails->item_warranty = $request->item_warranty[$num-1];
          $itemdetails->item_desc = $request->item_desc[$num-1];
          $itemdetails->save();
        }

      return redirect('/items')->with('success','Equipment/s Added!')->with('items',$items)->with('itemdetails', $itemdetails);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $items = Items::find($id);
      $itemdetails = Items::find($id)->itemdetail;
      $borrows = Borrow::all();
      $title = 'Viewing Equipment';

      return View('inventory/showitem')->with('title',$title)->with('items', $items)->with('borrows', $borrows)->with('itemdetails',$itemdetails);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $items = Items::find($id);
      $title = 'Edit Item';
      return View('inventory/edititem/')->with('items', $items)->with('title',$title);
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

          'item_warranty' => 'required',
          'item_notes' => 'required',
          'item_dateofpurchase' => 'required',
          'item_code' => 'required'

        ]);

          $itemdetails = ItemDetails::where('equipment_id', $id)->first();
          $itemdetails->equipment_id = $items->equipment_id;
          $itemdetails->item_dateofpurchase = $request->input('item_dateofpurchase');
          $itemdetails->item_warranty = $request->input('item_warranty');
          $itemdetails->item_notes = $request->input('item_notes');
          $itemdetails->item_code = $request->input('item_code');
          $itemdetails->item_status = 'AVAILABLE';
          $itemdetails->save();
      return redirect('items/'.$id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $items = Items::find($id);

      if ($items->item_status == 'AVAILABLE') {
        if(Borrow::where('equipment_id',$id)->where('borrow_status','borrowed')->sum('qtyBorrowed') > 0){
          return redirect('items/'.$id)->with('error','Status Cannot Be Changed, Item is Borrowed.');
        }
        $items->item_status = 'UNAVAILABLE';
        $items->save();
      } else {
        $items->item_status = 'AVAILABLE';
        $items->save();
      }

      return redirect('items/'.$id)->with('success','Equipment Status Changed!');
    }

    public function search(Request $request)
    {
      $term = $request->term;
      $items = Items::where('item_name','LIKE','%'.$term.'%')->get();
      if ( count($items) == 0){
        $searchResult[] = 'Equipment not found.';
      } else {
        foreach ($items as $key => $value) {
          $searchResult[] = $value->item_name;
        }
      }
      return $searchResult;

    }
    public function getItemName($id){
      $itemnames = ItemDetails::select('equipment_details_id', 'item_code', 'item_name','item_quantity')->where('item_code',$id)->where('item_status','AVAILABLE')->get();
      return $itemnames;
    }
}
