@extends('layout.app')
@section('content')
	<div id="wrapper">
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Viewing Equipment</h1>

					</div>
					<div class="row">
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
							<input type="text" class="form-control custom-search-form" id="searchProfile" name="encodedby" value="AUTHENTICATED USER HERE" disabled>
						</div>
					<div class="col-lg-12"><hr style="height:30px"></hr></div>
<!--		ITEM DETAILS  -->
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_name">Equipment Name</label>
							<input type="text" class="form-control custom-search-form"  name="item_name" value="{{$items->dateordered}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_type">Equipment Type</label>
							<input type="text" class="form-control custom-search-form"  name="item_type" value="{{$itemdetails->item_name}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_code">Item Code</label>
							<input type="text" class="form-control custom-search-form" name="item_code" value="{{$itemdetails->item_code}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="item_status">Equipment Status</label>
							<input type="text" class="form-control custom-search-form" name="item_status" value="{{$itemdetails->item_status}}" disabled>
						</div>
						<div class="form-group col-lg-8	">
							<label class="control-label" for="item_warranty">Equipment Warranty</label>
							<input type="text" class="form-control custom-search-form" name="item_warranty" value="{{$itemdetails->item_warranty}}" disabled>
						</div>
						<div class="form-group col-lg-12">
							<label class="control-label" for="encodedby">Description</label>
							<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control custom-search-form" name="item_desc" disabled>
							{{$itemdetails->item_description}}</textarea>
						</div>

					</div>

				{{-- {!!Form::open(['action'=> ['ItemsController@destroy', $items->equipment_id], 'method' => 'POST', 'class' => 'panel panel-body col-lg-12 form'])!!}
         {{Form::hidden('_method','DELETE')}}
				 <div class=" form-group col-lg-6"><br>
					 <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#itemeditmodal">Edit</button>
					 <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#viewrecordmodal">View Record</button>

			 </div>
        {!!Form::close()!!} --}}

		</div>
</div>

@endsection
