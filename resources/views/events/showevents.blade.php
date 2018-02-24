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
          <div class="col-lg-12">
            <br>
            <!--No function for milestones yet-->
            <label>Baka Milestones ito event</label><br>
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

        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#editproject">
          Edit
        </button>
      
@endsection
