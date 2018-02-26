@extends('layout.app')
@section('content')
	<?php
	use Illuminate\Support\Facades\Auth;
	use App\Projects;
	use App\Events;
	use App\Staffs;
	use App\Vols;
	use App\Profile;
	use App\ItemType;
	$id = Auth::id();
	$user = Staffs::find($id)->profile;
?>
<!-- ADDING MORE Borrow-->
<script type="text/javascript">
$(document).ready(function(){
    var i=1;
		var maxvalue ="";
    $('#addborrow').click(function(){
         i++;
         $('#dynamic_field_borrow').append('<tr id="row'+i+'"><td><select name="item_code[]" id="itemCode'+i+'" class="form-control itemCode'+i+'">@foreach($forBorrows as $key => $value)@if ($value->item_status == "AVAILABLE")<option value="{{$value->item_code}}">{{$value->item_code}}@endif</option>@endforeach</select></td><td><select name="item_name[]" class="form-control item_name'+i+'"></select></td><td><input type="number"  name="quantity_borrowed[]" placeholder="Enter Quantity" class="form-control qtytoBorrow'+i+'"></td><td><input type="number" name="numberofdays[]"  placeholder="Enter Days" class="form-control"></td><td><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');

         $(".itemCode"+i).change(function(){
           var id = $("#itemCode"+i).val();
           console.log(id);
           options = "";
					 maxvalue ="";
           $('.item_name'+i).empty();
           if (id){
             $.ajax({
               url:"/getItemName/"+id,
               type: "GET",
               data:{'id':id},
               success:function(response){
                 console.log(response);
                 for(x = 0; x < response.length;  x++){
                   options += "<option value='"+ response[x].item_name+"'>"+response[x].item_name+"</option>";
									 maxvalue += response[x].item_quantity;
                 }
                 $('.item_name'+i).append(options);
								 $('.qtytoBorrow'+i).attr({
				 		       "max" : maxvalue,
				 					 "min" : 1
				 		    });
               },
               error: function(data){
                 console.log(data);
               }
             });
           }
         });
    });
    $(document).on('click', '.btn_remove', function(){
         var button_id = $(this).attr("id");
         $('#row'+button_id+'').remove();
    });
});
</script>

			<div class="panel-body">
				<div class="panel-heading">
					<h1>Inventory</h1>
				</div>
				<div class="navbutton">
					<button type="button" class="btn btn-default btn-lg btn-inline noprint" data-toggle="modal" data-target="#addequipment">Add Items</button>
					<button type="button" class="btn btn-default btn-lg btn-inline noprint" data-toggle="modal" data-target="#borrowequipment">Borrow Equipment</button>
					<button type="button" class="btn btn-default btn-lg btn-inline noprint" data-toggle="modal" data-target="#listallborrowed">Return Equipments</button>
				</div><br>

				<table width="100%" class="table table-bordered table-hover table-responsive " id="dataTables">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Type</th>
  						<th>Code</th>
  						<th>Status</th>
            </tr>
        	</thead>

					@foreach ($itemdetails as $key => $value)
							<tr class="clickable-row" data-href="/itemdetails/{{$value->equipment_details_id}}">
									<td>{{$value->item_name}}</td>
									<td>{{$value->item_type}}</td>
									<td>{{$value->item_code}}</td>
									{{--  green available and more than 0 value--}}
									@if ($value->item_status == "AVAILABLE" && $value->item_quantity == 1)
										<td><font color="green"> {{$value->item_status}} </font></td>
									@elseif ($value->item_status != "AVAILABLE" && $value->item_quantity == 1)
										<td><font color="red"> {{$value->item_status}} </font></td>
									@elseif ($value->item_status == "AVAILABLE" && $value->item_quantity > 1)
										@foreach ($sum as $key2 => $value2)
											@if ($value->equipment_details_id == $value2->equipment_details_id)
												@if (($value->item_quantity - $value2->sumOf) != 0)
													<td><font color="green"> {{$value->item_quantity - $value2->sumOf}} LEFT </font></td>
												@else
													<td><font color="red"> {{$value->item_quantity - $value2->sumOf}} LEFT </font></td>
												@endif
											@endif
										@endforeach
									@endif
							</tr>
				@endforeach


				</table>
				<br>

			</div>
@endsection

<!-- Modal NEW ADD EQUIPMENT-->

<div class="modal fade bd-example-modal-lg" id="addequipment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Add Items</h3>

      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST', 'class' => 'panel body col-lg-12 form ui-front'])!!}

					<div class="form-group col-lg-6">
						<label class="control-label" for="dateordered">Date Ordered</label>
						<input type="date" class="form-control custom-search-form"  name="dateordered" placeholder="Enter Date of Order">
					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="datedelivered">Date Delivered</label>
						<input type="date" class="form-control custom-search-form"  name="datedelivered" placeholder="Enter Date of Delivery">
					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="receivedby">Received By</label>
						<input type="text" class="form-control custom-search-form" id="searchProfile" name="receivedby" placeholder="Enter Receiver">
					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="encodedby">Encoded By</label>
						<input type="text" class="form-control custom-search-form" name="encodedby" value="{{$user->firstname}} {{$user->lastname}}" disabled>
					</div>
					<div class="form-group col-lg-12">
										<div class="table-responsive">
												 <table class="table table-hover" id="dynamic_field">
													 		<thead>
																<th><label class="control-label" for="item_name">Item Name</label></th>
																<th><label class="control-label" for="item_type">Item Type</label></th>
																<th><label class="control-label" for="item_code">Item Code</label></th>
																<th><label class="control-label" for="item_quantity">Quantity</label></th>
																<th><label class="control-label" for="item_warranty">Warranty</label></th>
																<th><label class="control-label" for="item_desc">Description</label></th>
																<th><label class="control-label" for=""></label></th>
															</thead>
															<tr>
																	 <td><input type="text" name="item_name[]" placeholder="Enter Name" class="form-control"></td>
																	 <td><input type="text" id="searchItemType" name="item_type[]" placeholder="Enter Type" class="form-control"></td>
																	 <td><input type="text"  name="item_code[]" placeholder="Enter Code" class="form-control"</td>
																	 <td><input type="number"  name="item_quantity[]" class="form-control" value="1"</td>
																	 <td><input type="text"  name="item_warranty[]" placeholder="Enter Warranty"class="form-control"</td>
																	 <td><input type="text"  name="item_desc[]" placeholder="Enter Description" class="form-control"</td>
																	 <td><button type="button" name="add" id="add" class="btn btn-success btn-block">Add Item</button></td>
															</tr>
												 </table>
										</div>
					</div>

				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>





<!-- Modal BORROW EQUIPMENT-->
<div class="modal fade  bd-example-modal-lg" id="borrowequipment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Borrow Form</h3>

      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => 'BorrowsController@store', 'method' => 'POST','class' => 'col-lg-12 form  ui-front '])!!}

					<div class="form-group col-lg-12">
						<label class="control-label" for="dateborrowed">Date Borrowed</label>
						<input type="date" class="form-control custom-search-form" id="currentdate" name="dateborrowed" placeholder="Enter Date">
					</div>
					<script>
						document.getElementById('currentdate').value = new Date().toISOString().substring(0, 10);
					</script>

					<div class="form-group col-lg-12">
						<label class="control-label" for="borrower">Borrower</label>
						<select class="form-control custom-search-form" name="borrower">
							@foreach ($profiles as $key => $value)
								<option value="{{$value->firstname}} {{$value->lastname}}">{{$value->firstname}} {{$value->lastname}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-12">
										<div class="table-responsive">
												 <table class="table table-hover" id="dynamic_field_borrow">
													 		<thead>
																<th><label class="control-label" for="item_code">Item Code</label></th>
																<th><label class="control-label" for="item_name">Item Name</label></th>
																<th><label class="control-label" for="quantity_borrowed">Quantity to Borrow</label></th>
																<th><label class="control-label" for="numberofdays">Days to Borrow</label></th>
															</thead>
															<tr>
																<td><select name="item_code[]" id="itemCode" class="form-control itemCode" >
																@foreach ($itemdetails as $key => $value)
																	@if ($value->item_status == "AVAILABLE")
																		<option value="{{$value->item_code}}">{{$value->item_code}}</option>
																	@endif
																@endforeach
															</select></td>
																<td>
																	<select name="item_name[]" class="form-control item_name"></select>
																</td>
																{{-- if item quantity is one disable adding more quantity to borrow
																	if item has more than 1 quantity allow until max available quantity
																 	--}}
																<td><input type="number" name="quantity_borrowed[]" placeholder="Enter Quantity" class="form-control qtytoBorrow"></td>

																<td><input type="number" name="numberofdays[]"  placeholder="Enter Days" class="form-control"></td>
																<td><button type="button" name="addborrow" id="addborrow" class="btn btn-success btn-block">Add More</button></td>
															</tr>
												 </table>
										</div>
					</div>
					<div class="form-group col-lg-12"></div>

					<div class="form-group col-lg-12">
						<label class="control-label" for="purpose">Purpose</label>
						<textarea style="height: 10%; width: 100%; resize: vertical" class="form-control" name="purpose"></textarea>
					</div>


				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>



<!-- Modal VIEW BORROWED EQUIPMENT -->
<div class="modal fade bd-example-modal-lg" id="listallborrowed" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">All Borrow Forms</h3>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class=" col-lg-12 ml-auto">
					<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
						<thead>
							<tr>
								<th>Borrower</th>
								<th>Purpose</th>
								<th>Date Borrowed</th>
							</tr>
						</thead>
						@foreach ($profiles as $key => $value)
							@foreach($borrows as $key1 => $value1)
									@if ($value->profile_id == $value1->profile_id)
											@if (is_null($value1->returndate))
											<tr class="clickable-row" data-href="/borrows/{{$value1->borrow_id}}">
												<td>{{$value->firstname}} {{$value->lastname}}</td>
												<td>{{$value1->purpose}}</td>
												<td>{{$value1->dateborrowed}}</td>
											</tr>
										@endif
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




<!-- Modal BORROW FORMS -->
<div class="modal fade bd-example-modal-lg" id="returnconfirmation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Confirmation</h3>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class=" col-lg-12 ml-auto">


				<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-items">
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Item Code</th>
							<th>Date Borrowed</th>
							<th>Item Description</th>
						</tr>
					</thead>
				@foreach($borrowed as $key => $value)
						<tr>
							@if (is_null($value->returndate))
							 <td>{{$value->item_name}}</td>
							 <td>{{$value->item_code}}</td>
							 <td>{{$value->dateborrowed}}</td>
							 {!! Form::open(['action' => ['BorrowsController@update',$value->borrow_id], 'method' => 'POST', 'class' => 'form'])!!}
				 			{{ csrf_field() }}
							 <td><input type="text" name="item_desc[]" class="form-control" style="width: 100%" placeholder="condition of item here"></input></td>
							@endif
					 </tr>
				@endforeach
			</table>
				</div>
			</div>
      <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{{Form::submit('Return',['class' => 'btn btn-primary' ])}}
				{{Form::hidden('_method','PUT')}}
				{!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
</div>
