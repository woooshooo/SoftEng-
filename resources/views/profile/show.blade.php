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
       {!!Form::close()!!}
     </div>


@endsection

<!-- Modal View Borrowed Items-->
<div class="modal fade" id="viewborroweditems" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
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
              <th>Borrower</th>
              <th>Item Name</th>
              <th>Item Code</th>
              <th>To return after</th>
              <th>Date Borrowed</th>
              <th>Date Returned</th>
            </tr>
          </thead>
        @foreach($borrows as $key => $value)
           @if($value->profile_id == $profileid)
           <tr>
               <td>{{$value->profile[0]->firstname}} {{$value->profile[0]->lastname}}</td>
               <td>{{$value->itemdetails[0]->item_name}}</td>
               <td>{{$value->itemdetails[0]->item_code}}</td>
               <td>{{$value->borrowdetail[0]->numberofdays}} day/s</td>
               <td>{{$value->dateborrowed}}</td>
               @if(!empty($value->borrowdetail[0]->returndate))
                 <td>{{$value->borrowdetail[0]->returndate}}</td>
                 @else
                 <td>Not yet returned</td>
               @endif
           </tr>
           @endif
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
