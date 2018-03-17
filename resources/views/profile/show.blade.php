@extends('layout.app')
@section('content')
  <div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View {{$profiles->firstname}}'s Profile</h1>
        </div>
    </div>
      <div class="form-group col-lg-12 ">
        <button class="btn btn-default"onclick="history.go(-1);">Back </button>
      </div>
      {!! Form::open(['action' => ['VolsController@update', $profiles->profile_id], 'method' => 'POST',
        'class' => 'form'])!!}

        <div class="form-group col-lg-4">
          {{Form::label('fname', 'First Name')}}
          {{Form::text('fname', $profiles->firstname, ['class' => 'form-control','disabled' ,'placeholder' => 'First Name'])}}

        </div>
        <div class="form-group col-lg-4">
          {{Form::label('mname', 'Middle Name')}}
          {{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'disabled', 'placeholder' => 'Middle Name'])}}

        </div>
        <div class="form-group col-lg-4">
          {{Form::label('lname', 'Last Name')}}
          {{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'disabled','placeholder' => 'Last Name'])}}

        </div>
        <div class="form-group col-lg-6">
          {{Form::label('contactdetails', 'Contact Details')}}
          {{Form::text('contactdetails', $profiles->contactdetails,  ['class' => 'form-control', 'disabled','placeholder' => 'Contact Details'])}}

        </div>
        <div class="form-group col-lg-6">
          {{Form::label('email', 'Email Address')}}
          {{Form::email('email', $profiles->email, ['class' => 'form-control', 'disabled','placeholder' => 'Email Address'])}}
        </div>
        <div class="form-group col-lg-6">
          {{Form::label('coursestrand', 'Course or Strand')}}
          {{Form::text('coursestrand', $profiles->volunteer->course, ['class' => 'form-control','disabled', 'placeholder' => 'Course or Strand'])}}

        </div>
        <div class="form-group col-lg-6">
          {{Form::label('section', 'Section')}}
          {{Form::text('section', $profiles->volunteer->section, ['class' => 'form-control','disabled', 'placeholder' => 'Section'])}}

        </div>

        <div class="form-group col-lg-6">
          <label>Year Level</label>
          {{Form::select('yearlvl', ['Grade 11' => 'Grade 11',
                                     'Grade 12' => 'Grade 12',
                                     '1st Year' => '1st Year',
                                     '2nd Year' => '2nd Year',
                                     '3rd Year' => '3rd Year',
                                     '4th Year' => '4th Year',
                                     '5th Year' => '5th Year'],
           $profiles->volunteer->yearlvl, ['class'=>'form-control','disabled','placeholder' => 'Year Level or Grade'])}}
        </div>
        <div class="form-group col-lg-6">
          {{Form::label('vol_status', 'Status')}}
          {{Form::text('vol_status', $profiles->volunteer->vol_status, ['class' => 'form-control','disabled'])}}

        </div>

        <div class="form-group col-lg-12">
          <label>Cluster</label>
          {{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
                                     'Creative Cluster' => 'Creative Cluster',
                                     'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
          $profiles->volunteer->cluster, ['class'=>'form-control','disabled','placeholder' => 'Cluster'])}}
        </div>

      {!!Form::close()!!}
       {!!Form::open(['action'=> ['VolsController@destroy', $profiles->profile_id], 'method' => 'POST', 'class' => ''])!!}
        {{Form::hidden('_method','DELETE')}}
        <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#voleditprofilemodal">Edit</button>
        {{-- <a href="/vols/{{$profiles->profile_id}}/edit" class="btn btn-default">Edit</a> --}}
        @if ($profiles->volunteer->vol_status == 'INACTIVE')
           {{Form::submit('Change Status',['class' => 'btn btn-default' ])}}
         @else
           {{Form::submit('Change Status',['class' => 'btn btn-default' ])}}
        @endif
        {{-- <a href="/borrows/{{$profiles->profile_id}}" class="btn btn-default"> View Borrowed Items </a> --}}
       <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#viewborroweditems">View Borrowed Items</button>
       <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#viewprojects">View Projects</button>
       <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#viewevents">View Events</button>
       {!!Form::close()!!}
     </div>


@endsection

<!-- Modal View Borrowed Items-->
<div class="modal fade" id="viewborroweditems" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">{{$profiles->firstname}}'s Borrowed Items</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class=" col-lg-12 ml-auto">
            <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Item Code</th>
                  <th>To return after</th>
                  <th>Purpose</th>
                  <th>Date Borrowed</th>
                  <th>Date Returned</th>
                </tr>
              </thead>
              @foreach($borrows as $borrow)
                @foreach ($borrowdetails as $borrowdetail)
                  @foreach ($itemdetails as $itemdetail)
                    @if ($borrow->borrow_id == $borrowdetail->borrow_id)
                      @if ($borrowdetail->equipment_details_id == $itemdetail->equipment_details_id)
                        <tr>
                          <td>{{$itemdetail->item_name}}</td>
                          <td>{{$itemdetail->item_code}}</td>
                          <td>{{$borrowdetail->numberofdays}}</td>
                          <td>{{$borrow->purpose}}</td>
                          <td>{{$borrow->dateborrowed}}</td>
                          @if (!is_null($borrow->returndate))
                            <td>{{$borrow->returndate}}</td>
                          @else
                            <td>Not Yet Returned</td>
                          @endif
                        </tr>
                      @endif
                    @endif
                  @endforeach
                @endforeach
              @endforeach
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Projects Joined-->
<div class="modal fade" id="viewprojects" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">{{$profiles->firstname}}'s Projects Worked</h3>

      </div>
      <div class="modal-body">
      <div class="row">
        <div class=" col-lg-12 ml-auto">
          <table class="table table-bordered table-hover table-responsive" id="dataTables">
              <thead>
                  <tr>
                  <th>Project Name</th>
                  <th>Client</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  </tr>
              </thead>
              @foreach ($projects as $project)
                <tr class="clickable-row" data-href="/projects/{{$project->projects_id}}">
                    <td>{{$project->projects_name}}</td>
                    <td>{{$project->projects_client}}</td>
                    <td>{{$project->projects_startdate}}</td>
                    <td>{{$project->projects_deadline}}</td>
                    @if ($project->projects_status == "Ongoing")
                      <td><font color="green">{{$project->projects_status}}</font></td>
                    @else
                      <td><font color="tomato">{{$project->projects_status}}</font></td>
                    @endif
                </tr>
              @endforeach
          </table>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Projects Joined-->
<div class="modal fade" id="viewevents" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">{{$profiles->firstname}}'s Events Worked</h3>

      </div>
      <div class="modal-body">
      <div class="row">
        <div class=" col-lg-12 ml-auto">
          <table class="table table-bordered table-hover table-responsive" id="dataTables-vols">
              <thead>
                  <tr>
                  <th>Event Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  </tr>
              </thead>
              @foreach ($events as $event)
                @foreach ($profileevents as $profileevent)
                  @if ($event->events_id == $profileevent->events_id)
                    <tr class="clickable-row" data-href="/events/{{$event->events_id}}">
                        <td>{{$event->events_name}}</td>
                        <td>{{$event->events_startdate}}</td>
                        <td>{{$event->events_deadline}}</td>
                        @if ($event->events_status == "Ongoing")
                          <td><font color="green">{{$event->events_status}}</font></td>
                        @else
                          <td><font color="tomato">{{$event->events_status}}</font></td>
                        @endif
                    </tr>
                  @endif
                @endforeach
              @endforeach
          </table>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal VOL EDIT PROFILE-->
<div class="modal fade" id="voleditprofilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Edit Profle</h3>

      </div>
      <div class="modal-body">
        <div class="row">
        {!! Form::open(['action' => ['VolsController@update',$profiles->profile_id],  'method' => 'POST',
         'class' => 'form'])!!}

         <div class="form-group col-lg-4">
           {{Form::label('fname', 'First Name')}}
           {{Form::text('fname', $profiles->firstname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}

         </div>
         <div class="form-group col-lg-4">
           {{Form::label('mname', 'Middle Name')}}
           {{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}

         </div>
         <div class="form-group col-lg-4">
           {{Form::label('lname', 'Last Name')}}
           {{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}

         </div>
         <div class="form-group col-lg-6">
           {{Form::label('contactdetails', 'Contact Details')}}
           {{Form::text('contactdetails', $profiles->contactdetails,  ['class' => 'form-control', 'placeholder' => 'Contact Details'])}}

         </div>
         <div class="form-group col-lg-6">
           {{Form::label('email', 'Email Address')}}
           {{Form::email('email', $profiles->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
         </div>
         <div class="form-group col-lg-6">
           {{Form::label('coursestrand', 'Course or Strand')}}
           {{Form::text('coursestrand', $vols->course, ['class' => 'form-control', 'placeholder' => 'Course or Strand'])}}

         </div>
         <div class="form-group col-lg-6">
           {{Form::label('section', 'Section')}}
           {{Form::text('section', $vols->section, ['class' => 'form-control', 'placeholder' => 'Section'])}}

         </div>

         <div class="form-group col-lg-6">
           <label>Year Level</label>
           {{Form::select('yearlvl', ['Grade 11' => 'Grade 11',
                                      'Grade 12' => 'Grade 12',
                                      '1st Year' => '1st Year',
                                      '2nd Year' => '2nd Year',
                                      '3rd Year' => '3rd Year',
                                      '4th Year' => '4th Year',
                                      '5th Year' => '5th Year'],
             $vols->yearlvl, ['class'=>'form-control','placeholder' => 'Year Level or Grade'])}}
         </div>
         <div class="form-group col-lg-6">
            {{Form::label('vol_status', 'Status')}}
            {{Form::text('vol_status', $profiles->volunteer->vol_status, ['class' => 'form-control','disabled'])}}

          </div>

         <div class="form-group col-lg-12">
           <label>Cluster</label>
           {{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
                                      'Creative Cluster' => 'Creative Cluster',
                                      'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
             $vols->cluster, ['class'=>'form-control','placeholder' => 'Cluster'])}}
         </div>
         {{-- {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
         {{Form::reset('Reset', ['class' => 'btn btn-default'])}} --}}
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
