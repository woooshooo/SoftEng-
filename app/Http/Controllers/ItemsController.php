<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Borrow;
use App\Items;
use App\Profile;
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
        $borrows = Borrow::all();
        $avails = DB::select('select a.equipment_id,a.item_name, a.item_status, a.item_quantity, COALESCE(a.item_quantity - sum(b.qtyBorrowed),a.item_quantity) AS available, COALESCE(sum(b.qtyBorrowed),0) AS borrowed
          from equipments a left join (select * from borrow where borrow_status = "borrowed") b
          ON a.equipment_id = b.equipment_id group by a.equipment_id'); //returns the sum of qty borrowed

        $qtyB = DB::select('select SUM(b.qtyBorrowed) as qtyB FROM borrow b, equipments a WHERE b.borrow_status = "borrowed" GROUP BY a.equipment_id'); //returns the sum of qty borrowed
        $title = 'View Equipments';
        return view('inventory/index')->with('title', $title)->with('items', $items)->with('borrows', $borrows)->with('avails', $avails)->with('qtyB', $qtyB);
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
          'item_name' => 'required',
          'item_type' => 'required',
          'item_quantity' => 'required',
          'item_notes' => 'required',
        ]);

      $items = new Items;
      $items->item_name = $request->input('item_name');
      $items->item_type = $request->input('item_type');
      $items->item_quantity = $request->input('item_quantity');
      $items->item_notes = $request->input('item_notes');
      $items->save();

      return redirect('/items')->with('success','Equipment/s Added!')->with('items',$items);
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
      //$borrows = Borrow::find($id)->profile;
      $borrows = Borrow::all();
      $avails = DB::select('select (b.item_quantity - sum(a.qtyBorrowed)) AS `available`, sum(a.qtyBorrowed) AS `borrowed`, b.item_notes, b.item_status
      from borrow a left join equipments b
      ON a.equipment_id = b.equipment_id group by a.equipment_id'); //returns the sum of qty borrowed
      $title = 'Viewing Equipment';
      $borrowedBy = DB::select('select borrow.borrow_id as borrow_id, firstname, lastname, borrow.equipment_id, borrow.qtyBorrowed, borrow.borrow_status as borrow_status from `borrow` left join `profiles` on profiles.profile_id=borrow.profile_id');
      $totalBorrowed = DB::select('select equipment_id, sum(qtyBorrowed) as `sum` from `borrow`,`profiles` where borrow.profile_id=profiles.profile_id group by equipment_id');
      return View('inventory/showitem')->with('title',$title)->with('items', $items)->with('avails', $avails)->with('borrows', $borrows)->with('borrowedBy',$borrowedBy)->with('totalBorrowed',$totalBorrowed);

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
      return View('inventory/edititem')->with('items', $items)->with('title',$title);
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
          'item_name' => 'required',
          'item_type' => 'required',
          'item_quantity' => 'required',
          'item_notes' => 'required',
        ]);
      //update staff profile
      $items = Items::find($id);
      $items->item_name = $request->input('item_name');
      $items->item_type = $request->input('item_type');
      $items->item_quantity = $request->input('item_quantity');
      $items->item_notes = $request->input('item_notes');
      $items->save();

      return redirect('/items')->with('success','Equipment Edited!')->with('items',$items);
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
      if ($items->item_status == 'UNAVAILABLE') {
        $items->item_status = 'AVAILABLE';
        $items->save();
      } else {
        $items->item_status = 'UNAVAILABLE';
        $items->save();
      }

      return redirect('/items')->with('success','Equipment Status Changed!');
    }
}
