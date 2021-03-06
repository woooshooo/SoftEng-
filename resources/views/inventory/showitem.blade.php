@extends('layout.app')
@section('content')
	<div id="wrapper">
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Viewing {{$itemdetails->item_name}}</h1>

					</div>
					<div class="row ">
						{!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST', 'class' => 'panel body col-lg-12 form ui-front'])!!}

						<div class="form-group col-lg-6">
							<label class="control-label" for="dateordered">Date Ordered</label>
							<input type="date" class="form-control custom-search-form"  name="dateordered" placeholder="Enter Date of Order" value="{{$items->dateordered}}" disabled>
						</div>
						<div class="form-group col-lg-6">
							<label class="control-label" for="datedelivered">Date Delivered</label>
							<input type="date" class="form-control custom-search-form"  name="datedelivered" placeholder="Enter Date of Delivery" value="{{$items->datedelivered}}" disabled>
						</div>
						<div class="form-group col-lg-6">
							<label class="control-label" for="receivedby">Received By</label>
							<input type="text" class="form-control custom-search-form" id="searchProfile" name="receivedby" placeholder="Enter Receiver"value="{{$items->receivedby}}" disabled>
						</div>
						<div class="form-group col-lg-6">
							<label class="control-label" for="encodedby">Encoded By</label>
							<input type="text" class="form-control custom-search-form" id="searchProfile" name="encodedby" value="{{$items->encodedby}}" disabled>
						</div>
					<div class="col-lg-12"><hr style="height:30px"></hr></div>
<!--		ITEM DETAILS  -->
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_name">Equipment Name</label>
							<input type="text" class="form-control custom-search-form"  name="item_name" value="{{$itemdetails->item_name}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_type">Equipment Type</label>
							<input type="text" class="form-control custom-search-form"  name="item_type" value="{{$itemdetails->item_type}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_code">Item Code</label>
							<input type="text" class="form-control custom-search-form" name="item_code" value="{{$itemdetails->item_code}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_status">Equipment Status</label>
							<input type="text" class="form-control custom-search-form" name="item_status" value="{{$itemdetails->item_status}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_quantity">Quantity</label>
							<input type="number" class="form-control" id="item_quantity" name="item_quantity" value="{{$itemdetails->item_quantity}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_warranty">Equipment Warranty</label>
							<input type="text" class="form-control custom-search-form" name="item_warranty" value="{{$itemdetails->item_warranty}}" disabled>
						</div>
						<div class="form-group col-lg-6" style="align:left">
							<label class="control-label" for="item_desc">Condition</label>
							<input type="text" class="form-control" name="item_desc" value="{{$itemdetails->item_desc}}" disabled>
						</div>

					</div>

				{!!Form::open(['action'=> ['ItemsController@destroy', $items->equipment_id], 'method' => 'POST', 'class' => 'panel panel-body col-lg-12 form'])!!}
         {{Form::hidden('_method','DELETE')}}
				 <div class=" form-group col-lg-6"><br>
					 <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#itemeditmodal">Edit</button>
					 <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#viewrecordmodal">View Record</button>
					<button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#confirm">Change Status</button>

			 </div>
        {!!Form::close()!!}

		</div>
</div>

@endsection

<!-- Modal Edit -->
<div class="modal fade" id="itemeditmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Edit</h3>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						{!! Form::open(['action' => ['ItemsController@update',$items->equipment_id], 'method' => 'POST',
							'class' => 'col-lg-12 form'])!!}

							<div class="form-group col-lg-6">
								<label class="control-label" for="item_name">Equipment Name</label>
								<input type="text" class="form-control" id="item_name" name="item_name" value="{{$itemdetails->item_name}}">

							</div>
							<div class="form-group col-lg-6">
								<label class="control-label" for="item_type">Type of Equipment</label>
								<input type="text" class="form-control" id="item_kind" name="item_type" value="{{$itemdetails->item_type}}" >

							</div>
							<div class="form-group col-lg-6">
								<label class="control-label" for="item_quantity">Quantity</label>
								<input type="number" class="form-control" id="item_quantity" name="item_quantity" value="{{$itemdetails->item_quantity}}" >

							</div>
							<div class="form-group col-lg-6">
								<label class="control-label" for="item_warranty">Warranty</label>
								<input type="text" class="form-control" id="item_warranty" name="item_warranty" value="{{$itemdetails->item_warranty}}">

							</div>
							<div class="form-group col-lg-6">
								<label class="control-label" for="item_code">Code</label>
								<input type="text" class="form-control" id="item_code" name="item_code" value="{{$itemdetails->item_code}}">

							</div>
							<div class="form-group col-lg-12">
								<label class="control-label" for="item_desc">Input additional descriptions</label>
								<textarea class="form-control" id="item_desc" name="item_desc" style="resize:vertical" >{{$itemdetails->item_desc}}</textarea>
								<br>

							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{{Form::hidden('_method','PUT')}}
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- Modal View Record -->
<div class="modal fade" id="viewrecordmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Item Record</h3>

      </div>
      <div class="modal-body">
				<div class="row">
				<div class="col-lg-12">
        <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-viewrecord">
          <thead>
            <tr>
              <th>Borrower</th>
              <th>Purpose</th>
              <th>Days Due</th>
              <th>Purpose</th>
              <th>Date Borrowed</th>
              <th>Date Returned</th>
            </tr>
          </thead>
				@foreach ($borrowdetails as $borrowdetail)
					@foreach($borrows as $borrow)
	        	@foreach ($profiles as $profile)
							@if ($borrow->profile_id == $profile->profile_id)
								@if ($borrowdetail->borrow_id == $borrow->borrow_id)
										<tr>
	                    <td>{{$profile->firstname}} {{$profile->lastname}}</td>
	                    <td>{{$borrow->purpose}}</td>
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


<!--Confirmation -->
	<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	  <div class="modal-dialog modal-sm model-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h3 class="modal-title" id="exampleModalLongTitle">Confirm</h3>
	      </div>
	      <div class="modal-body">
					{!! Form::open(['action' => ['ItemDetailsController@update',$itemdetails->equipment_details_id], 'method' => 'POST', 'class' => 'form'])!!}
					<div class="row">
					<div class=" col-lg-12 ml-auto">

					Change Equipment Status : <select name="item_status" class="form-control">
						<option value="AVAILABLE">AVAILABLE</option>
						<option value="DAMAGED">DAMAGED</option>
						<option value="LOST">LOST</option>
						<option value="IN REPAIR">IN REPAIR</option>
						<option value="RETIRED">RETIRED</option>
					</select>
	      </div>
	      </div>
			</div>
	      <div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					{{Form::submit('Save Changes',['class' => 'btn btn-primary' ])}}
					{{Form::hidden('_method','PUT')}}
					{!!Form::close()!!}
	      </div>
	    </div>
	  </div>
	</div>
