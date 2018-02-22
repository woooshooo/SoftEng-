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
      $title = "Viewing Reports";
      $itemdetails = ItemDetails::all();
      view()->share('title',$title);
      view()->share('itemdetails',$itemdetails);
      $pdf = PDF::loadView('reports.reports');
      return $pdf->stream('test.pdf');
    }
}
