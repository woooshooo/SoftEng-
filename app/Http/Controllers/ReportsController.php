<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
      $title = "Viewing Reports";
      return view('reports.reports')->with('title',$title);
    }
}
