@extends('layout.app')
@section('content')
  {{-- <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script> --}}

  <div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$events->events_name}}</h1>
        </div>

    <div class="col-lg-12">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editevent">
          Edit Event
        </button>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addvolunteers">
        Assign Volunteers
      </button>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#additemmodal" onclick="console.log('Opened Modal');">
        Add Item Used
      </button>
      @if ($events->events_status == 'Finished')

      @else
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#finishevent" onclick="console.log('Opened Modal');">
          Finish Event
        </button>
      @endif

    </div>
    <div class="col-lg-12"><br></div>
        {!! Form::open(['action' => ['EventsController@update',$events->events_id], 'method' => 'POST',
        'class' => 'panel-body form', 'id' => 'progressBar'])!!}

          <h4>Expected Progess</h4>
          <div class="progress progress-striped active">
            <!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->
            <div id="projProgBar2" class="progress-bar progress-bar-danger" name="progress_bar" role="progressbar" aria-valuenow="{{$progressExpected}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progressExpected}}%">{{$progressExpected}}%</div>
          </div>

          <div class="col-lg-6">
            <label for="events_details">Event Details</label>
                <textarea style="height: 25%; width: 100%; resize: none" class="form-control" id="event_details" name="event_details" disabled>{{$events->events_details}}</textarea>
          </div>

        <div class="form-group col-lg-6">
            <label for="event_startdate">Event Start Date</label>
              <input type="date" name="event_startdate" class="form-control" value="{{$events->events_startdate}}" disabled>
            <label for="event_deadline">Event Deadline</label>
              <input type="date" name="event_deadline" class="form-control" value="{{$events->events_deadline}}" disabled>
            <label for="event_status">Status</label>
              <input type="text" name="event_status" class="form-control" value="{{$events->events_status}}" disabled>
      </div>
        <div class="col-lg-12"><hr></div>
        				<div class="col-lg-6">
        					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-vols">
        						<thead>
        							<th>Volunteers Assigned</th>
        							<th>Assigned To</th>
        							{{-- <th>Option</th> --}}
        						</thead>
                    @foreach ($profiles as $profile)
                      @foreach ($vols as $vol)
                        @foreach ($profileeventsassigned as $assigned)
                          @if ($assigned->events_id == $events->events_id)
                            @if ($profile->profile_id == $assigned->profile_id)
                              @if ($profile->profile_id == $vol->profile_id)
                                <tr class="clickable-row" data-href="/vols/{{$profile->profile_id}}">
                                  <td>{{$profile->firstname}} {{$profile->lastname}}</td>
                                  <td>
                                    @if ($assigned->pre_setup == 1 && $assigned->actual_event == 0 && $assigned->pack_up == 0)
                                      Pre Setup
                                    @elseif ($assigned->pre_setup == 0 && $assigned->actual_event == 1 && $assigned->pack_up == 0)
                                      Actual Event
                                    @elseif ($assigned->pre_setup == 0 && $assigned->actual_event == 0 && $assigned->pack_up == 1)
                                      Pack Up
                                    @elseif ($assigned->pre_setup == 1 && $assigned->actual_event == 0 && $assigned->pack_up == 1)
                                      Pre Setup, Pack Up
                                    @elseif ($assigned->pre_setup == 0 && $assigned->actual_event == 1 && $assigned->pack_up == 1)
                                      Actual Event, Pack Up
                                    @elseif ($assigned->pre_setup == 1 && $assigned->actual_event == 1 && $assigned->pack_up == 1)
                                      Pre Setup, Actual Event ,Pack Up
                                    @endif
                                </td>
                                {{-- <td><button type="button" class="btn btn-default" style="width: 100%;" data-toggle="modal" data-target="#editassigned">Edit</button></td> --}}
                                </tr>
                              @endif
                            @endif
                          @endif
                        @endforeach
                      @endforeach
                    @endforeach
        					</table>
        				</div>

        				<div class="col-lg-6">
        					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-vols2">
        						<thead>
        							<th>Volunteers Worked</th>
                      <th>Worked On</th>
        						</thead>
        						@foreach ($profiles as $profile)
        							@foreach ($vols as $vol)
                        @foreach ($profileeventsworked as $worked)
                          @if ($worked->events_id == $events->events_id)
                            @if ($profile->profile_id == $worked->profile_id)
                              @if ($profile->profile_id == $vol->profile_id)
                                <tr class="clickable-row" data-href="/vols/{{$profile->profile_id}}">
                                  <td>{{$profile->firstname}} {{$profile->lastname}}</td>
                                  <td>
                                    @if ($assigned->pre_setup == 1 && $assigned->actual_event == 0 && $assigned->pack_up == 0)
                                      Pre Setup
                                    @elseif ($assigned->pre_setup == 0 && $assigned->actual_event == 1 && $assigned->pack_up == 0)
                                      Actual Event
                                    @elseif ($assigned->pre_setup == 0 && $assigned->actual_event == 0 && $assigned->pack_up == 1)
                                      Pack Up
                                    @elseif ($assigned->pre_setup == 1 && $assigned->actual_event == 0 && $assigned->pack_up == 1)
                                      Pre Setup, Pack Up
                                    @elseif ($assigned->pre_setup == 0 && $assigned->actual_event == 1 && $assigned->pack_up == 1)
                                      Actual Event, Pack Up
                                    @elseif ($assigned->pre_setup == 1 && $assigned->actual_event == 1 && $assigned->pack_up == 1)
                                      Pre Setup, Actual Event,Pack Up
                                    @endif
                                </td>
                              </tr>
                              @endif
                            @endif
                          @endif
                        @endforeach
                      @endforeach
                    @endforeach
        					</table>
        				</div>
        <div class="col-lg-12"><hr></div>
        				<div class="col-lg-12">
        					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-eventitems">
        						<thead>
        							<th>Item Used in Event</th>
        						</thead>
        						@foreach ($itemdetails as $itemdetail)
        							@foreach ($eventitems as $eventitem)
        								@if ($itemdetail->equipment_details_id == $eventitem->equipment_details_id)
        									<tr>
        										<td>{{$itemdetail->item_name}}</td>
        									</tr>
        								@endif
        							@endforeach
        						@endforeach
        					</table>
        				</div>
        			<br><br>
        		</div>
          </div>
          <div class="col-lg-12"><br></div>
@endsection

<!--Edit Project Modal-->
<div class="modal fade" id="editevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Edit Event</h3>

      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => ['EventsController@update',$events->events_id], 'method' => 'POST',
						'class' => 'form'])!!}

									<div class="form-group col-lg-12">
										<label for="events_name">Project Title</label>
										<input type="text" class="form-control" id="events_name" name="events_name" value="{{$events->events_name}}">
									</div>


								  <div class="form-group col-lg-12">
										<label for="events_details">Event Details</label>
										<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="events_details" name="events_details">{{$events->events_details}}</textarea>
									</div>
									<div class="form-group col-lg-4">
										<label for="events_startdate">Event Start Date</label>
								    <input type="date" name="events_startdate" class="form-control" value="{{$events->events_startdate}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="events_deadline">Event Deadline</label>
								    <input type="date" name="events_deadline" class="form-control" value="{{$events->events_deadline}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="events_status">Status</label>
					    			{{Form::select('events_status', ['Ongoing' => 'Ongoing',
                                     'Finsihed' => 'Finsihed',
                                     'Pending' => 'Pending'],
          							$events->events_status, ['class'=>'form-control'])}}
									</div>
						</div>
				</div>
      <div class="modal-footer">
				{{Form::hidden('_method','PUT')}}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


<!-- Modal Add items used-->

<div class="modal fade" id="additemmodal" tabindex="-1" role="dialog" aria-labelledby ="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role-="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">Add Items Used</h3>
			</div>
			<div class="modal-body">
					{!! Form::open(['action' => 'ItemsEventController@store', 'method' => 'POST','class' => ' form  ui-front '])!!}
							<table class="table table-hover table-responsive" id="dynamic_field_additem">
								<thead>
									<th><label class="control-label" for="item_code">Item Code</label></th>
									<th><label class="control-label" for="item_name">Item Name</label></th>
									<th></th>
								</thead>
								<tr>
                  <input type="hidden" name="events_id" value="{{$events->events_id}}">
									<td><select name="item_code[]" id="itemCode" class="form-control itemCode" >
										@foreach ($itemdetails as $itemdetail)
											@if ($itemdetail->item_status == "AVAILABLE")
												<option value="{{$itemdetail->item_code}}">{{$itemdetail->item_code}}</option>
											@endif
										@endforeach
									</select></td>
									<td>
										<select name="item_name[]" class="form-control item_name"></select>
									</td>
									<td><button type="button" name="adduseditem" id="adduseditem" class="btn btn-success btn-block">Add More</button></td>
								</tr>
							</table>
					</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
	 {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Volunteers-->
<div class="modal fade" id="addvolunteers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h3 class="modal-title">Assign Volunteers</h3>
      </div>
      <div class="modal-body">
				{!! Form::open(['action'=> ['ProfileEventsAssignedController@store'], 'method' => 'POST',
					'class' => 'panel-body form ui-front'])!!}
					<div class="form-group col-lg-12">
						<input type="hidden" name="events_id" value="{{$events->events_id}}">
							<table class="table table-hover table-responsive" id="dynamic_field_addvolunteer2" name="volTable">
								<thead>
									<th><label class="control-label">Volunteer Name</label></th>
									<th><label class="control-label">Event Phase</label></th>
									<th></th>
								</thead>
								<tr>
                  <td><select class="form-control" name="volunteers[]"id="volName">
										@foreach ($profiles as $profile)
											@foreach ($vols as $vol)
												@if ($profile->profile_id == $vol->profile_id)
													<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>
												@endif
											@endforeach
										@endforeach
									</select></td>
                  <td>
                    <select class="selectpicker" name="eventphase[]" id="eventphaseID">
                      <option value="1">Pre Setup</option>
                      <option value="2">Actual Event</option>
                      <option value="3">Pack Up</option>
                      <option value="4">Pre Setup, Pack Up</option>
                      <option value="5">Actual Event, Pack Up</option>
                      <option value="6">Pre Setup, Actual Event,Pack Up</option>
                    </select>
                  </td>

									<td><button type="button" id="addvolunteersbtn2" class="btn btn-success btn-block">Add More</button></td>
								</tr>
							</table>
			    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			{!! Form::close() !!}
    </div>
  </div>
</div>


<!-- Modal FinishProjects-->
<div class="modal fade" id="finishevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h3 class="modal-title">Check Volunteers Worked</h3>
      </div>
      <div class="modal-body">
				{!! Form::open(['action'=> ['ProfileEventsWorkedController@store'], 'method' => 'POST',
					'class' => 'panel-body form was-validated'])!!}
					<div class="form-group col-lg-12">
            <input type="hidden" name="events_id" value="{{$events->events_id}}">
            <table class="table table-hover table-responsive" id="dynamic_field_addvolunteer3" name="volTable">
              <thead>
                <th><label class="control-label">Volunteer Name</label></th>
                <th><label class="control-label">Event Phase</label></th>
                <th></th>
              </thead>
              <tr>
                <td><select class="form-control" name="volunteers[]"id="volName">
                  @foreach ($profiles as $profile)
                    @foreach ($vols as $vol)
                      @if ($profile->profile_id == $vol->profile_id)
                        <option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>
                      @endif
                    @endforeach
                  @endforeach
                </select></td>
                <td>
                  <select class="selectpicker" name="eventphase[]" id="eventphaseID">
                    <option value="1">Pre Setup</option>
                    <option value="2">Actual Event</option>
                    <option value="3">Pack Up</option>
                    <option value="4">Pre Setup, Pack Up</option>
                    <option value="5">Actual Event, Pack Up</option>
                    <option value="6">Pre Setup, Actual Event,Pack Up</option>
                  </select>
                </td>

                <td><button type="button" id="addvolunteersbtn3" class="btn btn-success btn-block">Add More</button></td>
              </tr>
            </table>
			    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
