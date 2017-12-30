<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::all();
        $title = 'View Equipments';
        return view('inventory/index')->with('title', $title)->with('items', $items);
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
      //update staff profile
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
      $title = 'Borrow';
      return View('inventory/showitem')->with('items', $items)->with('title',$title);
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
      $items->delete();
      return redirect('/items')->with('success','Equipment Removed!');
    }
}
