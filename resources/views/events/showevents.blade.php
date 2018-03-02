@extends('layout.app')
@section('content')
  <div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$events->events_name}}</h1>
        </div>
    </div>
    <div class="form-group col-lg-12">
      <button class="btn btn-default"onclick="history.go(-1);">Back </button>
    </div>
        {!! Form::open(['action' => ['EventsController@update',$events->events_id], 'method' => 'POST',
        'class' => 'panel-body col-lg-12 form', 'id' => 'progressBar'])!!}
        <div class="col-lg-12">
          <div class="progress progress-striped active">
            <!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->


        </div>
        <div class = "col-lg-12">
          <div class="col-lg-6">
            <label for="events_details">Event Details</label>
                <textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="project_details" name="event_details" disabled>{{$events->events_details}}</textarea>
          </div>
          <div class="col-lg-6">
            <br>
            <!--No function for milestones yet-->
            <label>Event coverage checklist</label>
            <!--Lagay ng foreach for each Milestone from DB-->


        </div>
        </div>
        <div class="form-group col-lg-4">
            <label for="event_startdate">Event Start Date</label>
              <input type="date" name="event_startdate" class="form-control" value="{{$events->events_startdate}}" disabled>
        </div>
        <div class="form-group col-lg-4">
            <label for="event_deadline">Event Deadline</label>
              <input type="date" name="event_deadline" class="form-control" value="{{$events->events_deadline}}" disabled>
        </div>
        <div class="form-group col-lg-4">
            <label for="event_status">Status</label>
              <input type="text" name="event_status" class="form-control" value="{{$events->events_status}}" disabled>
        </div>

        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#editevent">
          Edit
        </button>

@endsection

<!--Edit Project Modal-->
<!-- Edit project Modal -->
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
										<label for="project_startdate">Event Start Date</label>
								    <input type="date" name="events_startdate" class="form-control" value="{{$events->events_startdate}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="project_deadline">Event Deadline</label>
								    <input type="date" name="project_deadline" class="form-control" value="{{$events->events_deadline}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="project_status">Status</label>
					    			{{Form::select('project_status', ['Ongoing' => 'Ongoing',
                                     'Finsihed' => 'Finsihed',
                                     'Pending' => 'Pending'],
          							$events->project_status, ['class'=>'form-control'])}}
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
