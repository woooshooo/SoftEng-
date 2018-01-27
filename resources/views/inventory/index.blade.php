@extends('layout.app')
@section('content')
			<div class="panel-body">
				<div class="panel-heading">
					<h1>Equipment Inventory</h1>
				</div>
				<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Status</th>
  						<th>Total Quantity</th>
  						<th>Available</th>
  						<th>Borrowed</th>
            </tr>
        	</thead>

					@foreach ($avails as $value)
						<tr class="clickable-row" data-href="/items/{{$value->equipment_id}}">
								@if($value->item_status == 'UNAVAILABLE')
										<td>{{$value->item_name}}</td>
										<td><font color="red">{{$value->item_status}}</font></td>
										<td>{{$value->item_quantity}}</td>
										<td>N/A</td>
										<td>N/A</td>
								@elseif ($value->item_quantity == $value->borrowed)
									<td>{{$value->item_name}}</td>
									<td><font color="red"> NO {{$value->item_status}}</font></td>
									<td>{{$value->item_quantity}}</td>
									<td>{{$value->available}}</td>
									<td>{{$value->borrowed}}</td>
									@else
										<td>{{$value->item_name}}</td>
										<td><font color="green">{{$value->item_status}}</font></td>
										<td>{{$value->item_quantity}}</td>
										<td>{{$value->available}}</td>
										<td>{{$value->borrowed}}</td>
									@endif
						</tr>
				@endforeach

				</table>
				<br>
				<div class="navbutton">
					<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#addequipment">Add Equipment</button>
					<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#borrowequipment">Borrow Equipment</button>
					<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#listallborrowed">View all borrowed</button>
				</div>
			</div>
@endsection

<!-- Modal ADD EQUIPMENT -->
<div class="modal fade" id="addequipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Add Equipment</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="row">
				{!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST',
					'class' => 'panel body col-lg-12 form'])!!}
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_name">Equipment Name</label>
						<input type="text" class="form-control" id="item_name" name="item_name">

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_type">Type of Equipment</label>
						<input type="text" class="form-control" id="item_kind" name="item_type">

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_quantity">Quantity</label>
						<input type="number" class="form-control" id="item_quantity" name="item_quantity">

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_warranty">Warranty</label>
						<input type="text" class="form-control" id="item_warranty" name="item_warranty">

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_dateofpurchase">Date of Purchase</label>
						<input type="text" class="form-control" id="item_dateofpurchase" name="item_dateofpurchase">

					</div>
					<div class="form-group col-lg-12">
						<label class="control-label" for="item_notes">Input additional notes here.</label>
						<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="item_notes" name="item_notes"></textarea>
						<br>
					</div>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- Modal BORROW EQUIPMENT-->
<div class="modal fade" id="borrowequipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Borrow Equipment Form</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => 'BorrowsController@store', 'method' => 'POST','class' => 'col-lg-12 form  ui-front ', 'id' => 'add_item'])!!}

					<div class="form-group col-lg-12">
						<label class="control-label" for="borrower">Borrower</label>
						<input type="text" class="form-control custom-search-form" id="searchProfile" name="borrower" placeholder="Enter Borrower">
					</div>
					<div class="form-group col-lg-12">
										<div class="table-responsive">
												 <table class="table table-hover" id="dynamic_field">
													 		<thead>
																<th><label class="control-label" for="item_name">Enter Equipment Name</label></th>
																<th><label class="control-label" for="qtyBorrowed">Qty Borrowed</label></th>
															</thead>
															<tr>
																	 <td><input type="text" id="searchItem" name="item_name[]" placeholder="Enter Equipment Name" class="form-control"></td>
																	 <td><input type="number" name="qtyBorrowed[]"  placeholder="Quantiy to Borrow" class="form-control"></td>
																	 <td><button type="button" name="add" id="add" class="btn btn-success btn-block">Add More</button></td>
															</tr>
												 </table>
										</div>
					</div>
					<div class="form-group col-lg-12"></div>

					<div class="form-group col-lg-12">
						<label class="control-label" for="purpose">Purpose</label>
						<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" name="purpose"></textarea>
					</div>


				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>



<!-- Modal ADD EQUIPMENT -->
<div class="modal fade bd-example-modal-lg" id="listallborrowed" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">All Equipments Borrowed</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="row">
					<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
						<thead>
							<tr>
								<th>Borrower</th>
								<th>Item Name</th>
								<th>Quantity Borrowed</th>
								<th>Date Borrowed</th>
								<th>Option</th>
							</tr>
					</thead>
					@foreach ($borrowedBy as $value)
					 @if ($value->borrow_status == 'borrowed')
						 <tr>
							<td>{{$value->firstname}} {{$value->lastname}} </td>
							<td>{{$value->item_name}}</td>
							<td>{{$value->qtyBorrowed}}</td>
							<td>{{$value->created_at}}</td>
							{!! Form::open(['action' => ['BorrowsController@update',$value->borrow_id], 'method' => 'POST',
								'class' => 'form'])!!}
							<td>{{Form::submit('Return',['class' => 'btn btn-default btn-block' ])}}</td>
							{{Form::hidden('_method','PUT')}}
							{!!Form::close()!!}

						 </tr>
					 @endif
				 @endforeach
				</table>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
      </div>
    </div>
  </div>
</div>
