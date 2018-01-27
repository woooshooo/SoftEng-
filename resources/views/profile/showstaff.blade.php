
@extends('layout.app')
@section('content')
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">View {{$profiles->firstname}}'s Profile</h1>
					</div>
					<!-- /.col-lg-12 -->
			</div>
				<div class="form-group col-lg-12">
					<button class="btn btn-default"onclick="history.go(-1);">Back </button>
				</div>

				<div class="form-group col-lg-4">
					<label class="control-label" for="fname">First Name</label>
					{{Form::text('fname', $profiles->firstname, ['class' => 'form-control', 'disabled','placeholder' => 'First Name'])}}

				</div>
				<div class="form-group col-lg-4">
					<label class="control-label" for="mname">Middle Name</label>
					{{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'disabled','placeholder' => 'Middle Name'])}}
				</div>

				<div class="form-group col-lg-4">
					<label class="control-label" for="lname">Last Name</label>
					{{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'disabled','placeholder' => 'Last Name'])}}
				</div>
				<br>
				<div class="form-group col-lg-6">
					<label class="control-label" for="contactdetails">Contact Details</label>
					{{Form::text('contactdetails', $profiles->contactdetails, ['class' => 'form-control', 'disabled','placeholder' => 'Contact Details'])}}
				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="email">Email Address</label>
					{{Form::email('email', $profiles->email, ['class' => 'form-control', 'disabled','placeholder' => 'Email Address'])}}
				</div>
				<br>
				<div class="form-group col-lg-6">
					<label class="control-label" for="staff_pos">Position</label>
					{{Form::text('staff_pos', $profiles->staff->staff_pos, ['class' => 'form-control', 'disabled','placeholder' => 'Staff Position'])}}
				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="staff_status">Status</label>
					{{Form::text('staff_status', $profiles->staff->staff_status, ['class' => 'form-control', 'disabled','placeholder' => 'Staff Status'])}}
				</div>

				<div class="form-group col-lg-12">
					<label>Cluster</label>
					{{Form::select('cluster', ['Administrator' => 'Administrator' ,
																		 'Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
						 												 'Creative Cluster' => 'Creative Cluster',
						 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
            $profiles->staff->cluster, ['class'=>'form-control','disabled','placeholder' => 'Choose Cluster'])}}
				</div>
       {!!Form::open(['action'=> ['StaffsController@destroy', $profiles->profile_id], 'method' => 'POST', 'class' => 'pull-left'])!!}
        {{Form::hidden('_method','DELETE')}}
				<button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#staffeditprofilemodal">Edit</button>
        {{-- <a href="/staffs/{{$profiles->profile_id}}/edit" class="btn btn-default">Edit</a> --}}
				@if ($profiles->staff->staff_status == 'INACTIVE')
					{{Form::submit('Change Status',['class' => 'btn btn-default' ])}}
				@else
					{{Form::submit('Change Status',['class' => 'btn btn-default' ])}}
			 	@endif
				{{-- <a href="/borrows/{{$profiles->profile_id}}" class="btn btn-default"> View Borrowed Items </a> --}}
				<button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#viewborroweditems">View Borrowed Items</button>
			 {!!Form::close()!!}

@endsection
<!-- Modal View Borrowed Items-->
<div class="modal fade" id="viewborroweditems" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">{{$profiles->firstname}}'s Borrowed Items</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
                  <thead>
                    <tr>
          						<th>Item Name</th>
          						<th>Quantity Borrowed</th>
          						<th>Purpose</th>
                      <th>Date Borrowed</th>
                      <th>Date Returned</th>
                    </tr>
                </thead>
                @foreach ($borrows as $value)
                  @if ($value->firstname == $profiles->firstname)
                    <tr class="clickable-row" data-href="/items/{{$value->equipment_id}}">
                      <td>{{$value->item_name}}</td>
                      <td>{{$value->qtyBorrowed}}</td>
                      <td>{{$value->purpose}}</td>
                      <td>{{$value->created_at}}</td>
                      @if($value->borrow_status == "borrowed")
                        <td>Not yet returned.</td>
                      @else
                        <td>{{$value->updated_at}}</td>
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

<!-- Modal STAFF EDIT PROFILE-->
<div class="modal fade" id="staffeditprofilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLongTitle">Edit Profle</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					{!! Form::open(['action' => ['StaffsController@update',$profiles->profile_id], 'method' => 'POST',
					 'class' => 'form'])!!}

					 <div class="form-group col-lg-4">
						 <label class="control-label" for="fname">First Name</label>
						 {{Form::text('fname', $profiles->firstname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}

					 </div>
					 <div class="form-group col-lg-4">
						 <label class="control-label" for="mname">Middle Name</label>
						 {{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
					 </div>

					 <div class="form-group col-lg-4">
						 <label class="control-label" for="lname">Last Name</label>
						 {{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
					 </div>
					 <br>
					 <div class="form-group col-lg-6">
						 <label class="control-label" for="contactdetails">Contact Details</label>
						 {{Form::text('contactdetails', $profiles->contactdetails, ['class' => 'form-control', 'placeholder' => 'Contact Details'])}}
					 </div>
					 <div class="form-group col-lg-6">
						 <label class="control-label" for="email">Email Address</label>
						 {{Form::email('email', $profiles->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
					 </div>
					 <br>
					 <div class="form-group col-lg-6">
						 <label class="control-label" for="staff_pos">Staff Position</label>
						 {{Form::text('staff_pos', $staffs->staff_pos, ['class' => 'form-control', 'placeholder' => 'Staff Position'])}}
					 </div>
					 <div class="form-group col-lg-6">
						 <label class="control-label" for="staff_status">Status</label>
						 {{Form::text('staff_status', $profiles->staff->staff_status, ['class' => 'form-control', 'disabled','placeholder' => 'Staff Status'])}}
					 </div>
					 <div class="form-group col-lg-12">
						 <label>Cluster</label>
						 {{Form::select('cluster', ['Administrator' => 'Administrator' ,
																				'Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
																				'Creative Cluster' => 'Creative Cluster',
																				'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
								$staffs->cluster, ['class'=>'form-control','placeholder' => 'Choose Cluster'])}}
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
