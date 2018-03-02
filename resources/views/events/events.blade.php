@extends('layout.app')
@section('content')
	<?php
	 	use App\Events;
		use App\Staffs;
		use App\Profile;
		use App\ProfileEvents;
	?>
		<div class="container">
            <h1 class="page-header">Events</h1>
            <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>Event Name</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    </tr>
                </thead>
								@foreach ($events as $value)
										<tr class="clickable-row" data-href="/events/{{$value->events_id}}">
												<td>{{$value->events_startdate}}</td>
												<td>{{$value->events_name}}</td>
												<td>{{$value->events_deadline}}</td>
												<td>{{$value->events_status}}</td>

										</tr>
								@endforeach
            </table>
        </div>
@endsection

<!-- ADD Event Modal-->
<div class="modal fade" id="addevents" tabindex="-1" role="dialog" aria-labelledby="myLargeModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role-="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="exampleModalLongTitle">Add Project</h3>
			</div>
			<div class="modal-body">
				{!! Form::open(['action' => 'EventsController@store', 'method' => 'POST',
					'class' => 'panel body col-lg-12 form ui-front'])!!}
					<div class="col-lg-12">
						<label class="control-label" for="events_name">Project Name</label>
						<input type="text" class="form-control" id="events_name" name="events_name" placeholder="Project Name" required>
					</div>
					<!--
					<div class="col-lg-6">
						<label class="control-label" for="client_name">Client Name</label>
						<input type="text" class="form-control" id="events_client" name="client_name" placeholder="Client Name" required>
					</div>
				-->
					<div class="col-lg-12"><br></div>
					<div class="col-lg-12">
						<label class="form-check-label"><u>Choose Cluster/s assigned</u><font color="tomato">(cannot be changed afterwards)</font></label>
						<br>
								<label><input type="checkbox" class="form-check-input" name="cluster_name[]" value="Broadcast & Productions Cluster"required> Broadcast & Productions Cluster</label>
								<br>
								<label>
								<input type="checkbox" class="form-check-input" name="cluster_name[]" value="Creative Cluster"> Creative Cluster</label>
								<br><label>
								<input type="checkbox" class="form-check-input" name="cluster_name[]" value="Editorial & Social Media Cluster"> Editorial & Social Media Cluster</label>
								<br>
					</div>
					<div class="col-lg-12"><br></div>
					<div class="col-lg-12">
						<label for="events_details">Project Details</label>
						<textarea class="form-control" style="resize:vertical" id="events_details" name="events_details"required></textarea>
					</div>
					<div class="col-lg-12"><br></div>
					<div class="col-lg-4">
						<label for="events_startdate">Project Start Date</label>
						<input type="date" name="events_startdate" class="form-control" id="projectDatePicker"required>
					</div>
					<div class="col-lg-4">
						<label for="events_deadline">Project Deadline</label>
						<input type="date" name="events_deadline" class="form-control" id="projectDatePicker"required>
					</div>
					<div class="col-lg-4">
						<label for="events_status">Status</label>
						<!--Changed to dropdown. Change back to textbox if needed (sorry if nag buot2 ko huhuhu)-->
							<select class="form-control col-lg-4" name="events_status">
								<option value="Ongoing">Ongoing</option>
								<option value="Finsihed">Finsihed</option>
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
