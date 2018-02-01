<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Borrow;
use App\Items;
use App\Profile;
use App\ItemDetails;
use App\BorrowDetails;
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
        $items = Items::all();
        $itemdetails = ItemDetails::all();
        $borrows = Borrow::all();
        $profiles = Profile::all();
        $borrowdetails = BorrowDetails::all();
        // foreach ($borrows as $key => $value) {
        //   return $value->profile[$key]->firstname;
        //
        // }

        // $avails = DB::select('select a.equipment_id,a.item_name, a.item_quantity, COALESCE(a.item_quantity - sum(b.qtyBorrowed),a.item_quantity) AS available, COALESCE(sum(b.qtyBorrowed),0) AS borrowed
        //   from equipments a left join (select * from borrow where borrow_status = "borrowed") b
        //   ON a.equipment_id = b.equipment_id group by a.equipment_id'); //returns the sum of qty borrowed
        $title = 'View Equipments';
        // $borrowedBy = DB::select('select borrow.borrow_id AS borrow_id, firstname, lastname, borrow.equipment_id, equipments.item_name AS item_name, borrow.purpose AS purpose, borrow.qtyBorrowed, borrow.borrow_status AS borrow_status, borrow.created_at AS created_at, borrow.updated_at AS updated_at FROM `borrow` LEFT JOIN `profiles` ON profiles.profile_id = borrow.profile_id LEFT JOIN `equipments` ON borrow.equipment_id = equipments.equipment_id');


        return view('inventory/index')->with('title', $title)->with('items', $items)->with('borrows', $borrows)->with('itemdetails',$itemdetails)->with('borrowdetails',$borrowdetails);
        // ->with('avails', $avails)->with('borrowedBy',$borrowedBy)
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

      //validate
        $this->validate($request, [
          'dateordered' => 'required',
          'datedelivered' => 'required',
          'receivedby' => 'required',
          'encodedby' => 'required',
          'item_name' => 'required',
          'item_type' => 'required',
          'item_code' => 'required'
        ]);

          $count = count($request->item_name);
          $items = new Items;
          $items->dateordered = $request->input('dateordered');
          $items->datedelivered = $request->input('datedelivered');
          $items->receivedby = $request->input('receivedby');
          $items->encodedby = $request->input('encodedby');
          $items->save();
        for($num = $count; $num > 0; $num-- ){
          $itemdetails = new ItemDetails;
          $itemdetails->equipment_id = $items->equipment_id;
          $itemdetails->item_name = $request->item_name[$num-1];
          $itemdetails->item_type = $request->item_type[$num-1];
          $itemdetails->item_code = $request->item_code[$num-1];
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
}
