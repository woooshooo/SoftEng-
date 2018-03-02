$title = 'Viewing Project';
$events = Projects::find($id);
$startdate = strtotime($events->event_startdate);
$enddate = strtotime($events->event_deadline);
$currdate = strtotime(date("Y-m-d"));
$totaldays = ($enddate-$startdate)/86400;
$remainingdays = ($enddate-$currdate)/86400;
if ($remainingdays==0) {
  $progressExpected = 100;
} else {
  $progressExpected = sprintf('%0.0f', round(($remainingdays/$totaldays)*100, 2));
}
$profileevents = EventProjects::all();
$profiles = Events::all();
$vols = Vols::all();
$cluster = DB::select('select distinct cluster from vols');
// it just get the same equipment_details_id and the project id
$eventtitems = ItemsEvent::where('events_id',$id)->get();
$itemdetails = ItemDetails::all();
// return $events;
$milestones = MilestoneEvents::where('events_id', $id)->get();
$finished = FinishedMilestones::where('events_id', $id)->get();
$getmilestones = count($milestones);
$getfinished = count($finished);
$progress;
if($getmilestones == 0 || $getfinished == 0){
  $progress = 0;
}
else{
  $progress = sprintf('%0.0f', round(($getfinished/$getmilestones)*100, 2));
}
return view('event/showproject')->with('title',$title)->with('event',$events)->with('milestones', $milestones)->with('progress', $progress)->with('progressExpected', $progressExpected)->with('projectitems', $eventtitems)->with('itemdetails',$itemdetails)->with('profiles',$profiles)->with('profileevent',$profileevents)->with('vols',$vols);
}
