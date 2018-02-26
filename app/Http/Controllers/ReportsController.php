<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Items;
use App\Profile;
use App\Staffs;
use App\ItemDetails;
use App\BorrowDetails;
use App\sumofBorrowed;
use DB;
use PDF;
class ReportsController extends Controller
{
    public function index(){
      $title = "Viewing Reports";
      return view('reports.reports')->with('title',$title);
    }
    public function streampdf(Request $request){
      $title = 'View Equipments';
      $profiles = Profile::all();
      $items = Items::all();
      $itemdetails = ItemDetails::all();
      $forBorrows = ItemDetails::all();
      $borrows = Borrow::all();
      $borrowed = DB::select('select borrow.borrow_id, borrow.dateborrowed, borrow.purpose, borrow.profile_id, borrow.returndate, PROFILES.firstname, PROFILES.lastname, equipment_details.* FROM equipment_details INNER JOIN borrow_details ON borrow_details.equipment_details_id = equipment_details.equipment_details_id INNER JOIN borrow ON borrow.borrow_id = borrow_details.borrow_id INNER JOIN profiles ON profiles.profile_id = borrow.profile_id');
      $profiles = Profile::all();
      $sum = DB::select('select equipment_details_id, item_name, sum(quantity_borrowed) as sumOf from sumofBorrowed group by equipment_details_id');
      $pdf = PDF::loadView('reports.reports', compact('title'));
      return $pdf->download('test.pdf');
    }
}
