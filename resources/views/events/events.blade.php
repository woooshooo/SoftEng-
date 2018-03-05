@extends('layout.app')
@section('content')
	<?php
		use App\Events;
		use App\Staffs;
		use App\Profile;
		use App\ProfileEvents;
	?>
				<div class="panel-body">
					<div class="panel-heading">
						<h1>Events</h1>
					</div>
					<div class="navbutton">
						<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#addevents">Add Events</button>
					</div><br>
					<div>
            <table class="table table-bordered table-hover table-responsive" id="dataTables-projects">
                <thead>
                    <tr>
                    <th>Events Name</th>
										<th>Start Date</th>
										<th>End Date</th>
                    <th>Status</th>
                    </tr>
                </thead>
								@foreach ($events as $value)
										<tr class="clickable-row" data-href="/events/{{$value->events_id}}">
												<td>{{$value->events_name}}</td>
												<td>{{$value->events_startdate}}</td>
												<td>{{$value->events_deadline}}</td>
												@if ($value->events_status == "Ongoing")
													<td><font color="green">{{$value->events_status}}</font></td>
												@else
													<td><font color="tomato">{{$value->events_status}}</font></td>
												@endif
										</tr>
								@endforeach
            </table>
					</div>
        </div>
@endsection

<!--Modal Add Events-->
<div class="modal fade" id="addevents" tabindex="-1" role="dialog" aria-labelledby="myLargeModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role-="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="exampleModalLongTitle">Add Events</h3>
			</div>
			<div class="modal-body">
				{!! Form::open(['action' => 'EventsController@store', 'method' => 'POST',
					'class' => 'panel body col-lg-12 form ui-front'])!!}
					<div class="col-lg-6">
						<label class="control-label" for="event_name">Events Name</label>
						<input type="text" class="form-control" id="event_name" name="events_name" placeholder="Event Name" required>
					</div>
					<div class="col-lg-12"><br></div>
					<div class="col-lg-12">
						<label for="event_details">Events Details</label>
						<textarea class="form-control" style="resize:vertical" id="event_details" name="events_details"required></textarea>
					</div>
					<div class="col-lg-12"><br></div>
					<div class="col-lg-4">
						<label for="event_startdate">Event Start Date</label>
						<input type="date" name="events_startdate" class="form-control" id="projectDatePicker"required>
					</div>
					<div class="col-lg-4">
						<label for="event_deadline">Event Deadline</label>
						<input type="date" name="events_deadline" class="form-control" id="projectDatePicker"required>
					</div>
					<div class="col-lg-4">
						<label for="events_status">Status</label>
						<!--Changed to dropdown. Change back to textbox if needed (sorry if nag buot2 ko huhuhu)-->
							<select class="form-control col-lg-4" name="events_status">
								<option value="Ongoing">Ongoing</option>
								<option value="Pending">Pending</option>
							</select>
						</div>

					<div class="col-lg-12"><br></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 				<button type="submit" class="btn btn-primary">Save</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
