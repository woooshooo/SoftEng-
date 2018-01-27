@extends('layout.app')
@section('content')
	<div id="wrapper">
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Viewing Equipment

							</h1>
					</div>
					<!-- /.col-lg-12 -->
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_name">Equipment Name</label>
					<input type="text" class="form-control" id="item_name" name="item_name" value="{{$items->item_name}}" disabled>

				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_type">Type of Equipment</label>
					<input type="text" class="form-control" id="item_kind" name="item_type" value="{{$items->item_type}}" disabled>

				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_quantity">Quantity</label>
					<input type="number" class="form-control" id="item_quantity" name="item_quantity" value="{{$items->item_quantity}}" disabled>

				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_status">Equipment Status</label>
					<input type="text" class="form-control" id="item_status" name="item_status" value="{{$items->item_status}}" disabled>

				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_warranty">Equipment Warranty</label>
					<input type="text" class="form-control" id="item_warranty" name="item_warranty" value="{{$items->item_warranty}}" disabled>

				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_dateofpurchase">Date of Purchase</label>
					<input type="text" class="form-control" id="item_dateofpurchase" name="item_dateofpurchase" value="{{$items->item_dateofpurchase}}" disabled>

				</div>
				<div class="form-group col-lg-12">
					<label class="control-label" for="item_notes">Additional notes here.</label>
					<textarea class="form-control" id="item_notes" name="item_notes" style="resize:none" disabled>{{$items->item_name}}</textarea>
				</div>

				<div class=" form-group col-lg-6">
					 <table class="well table table-bordered table-hover table-responsive">
						 <thead>
							 <tr>
								 <th>Borrowers</th>
								 <th>Quantity Borrowed</th>
								 <th>Option</th>
							 </tr>
					 </thead>
					 @foreach ($borrowedBy as $value)
						@if (($value->equipment_id == $items->equipment_id) && ($value->borrow_status == 'borrowed'))
							<tr>
							 <td>{{$value->firstname}} {{$value->lastname}} </td>
							 <td>{{$value->qtyBorrowed}}</td>
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
				{!!Form::open(['action'=> ['ItemsController@destroy', $items->equipment_id], 'method' => 'POST', 'class' => 'panel panel-body col-lg-12 form'])!!}
         {{Form::hidden('_method','DELETE')}}
				 <div class=" form-group col-lg-6"><br>
					 <button type="button" class="btn btn-default btn-inline" data-toggle="modal" data-target="#itemeditmodal">Edit</button>
					 {{-- <a href="/items/{{$items->equipment_id}}/edit" class="btn btn-default">Edit</a> --}}
				 @if ($items->item_status == 'UNAVAILABLE')
				 		{{Form::submit('Make Available',['class' => 'btn btn-default' ])}}
					@else
						{{Form::submit('Make Unavailable',['class' => 'btn btn-default' ])}}
				 @endif
			 </div>
        {!!Form::close()!!}

		</div>
</div>

@endsection

<!-- Modal -->
<div class="modal fade" id="itemeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Edit Equipment</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="row">
				{!! Form::open(['action' => ['ItemsController@update',$items->equipment_id], 'method' => 'POST',
					'class' => 'col-lg-12 form'])!!}
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_name">Equipment Name</label>
						<input type="text" class="form-control" id="item_name" name="item_name" value="{{$items->item_name}}" >

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_type">Type of Equipment</label>
						<input type="text" class="form-control" id="item_kind" name="item_type" value="{{$items->item_type}}" >

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_quantity">Quantity</label>
						<input type="number" class="form-control" id="item_quantity" name="item_quantity" value="{{$items->item_quantity}}" >

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_warranty">Warranty</label>
						<input type="text" class="form-control" id="item_warranty" name="item_warranty" value="{{$items->item_warranty}}">

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_dateofpurchase">Date of Purchase</label>
						<input type="text" class="form-control" id="item_dateofpurchase" name="item_dateofpurchase" value="{{$items->item_dateofpurchase}}">

					</div>
					<div class="form-group col-lg-6">
						<label class="control-label" for="item_code">Code</label>
						<input type="text" class="form-control" id="item_code" name="item_code" value="{{$items->item_code}}">

					</div>
					<div class="form-group col-lg-12">
						<label class="control-label" for="item_notes">Input additional notes here.</label>
						<textarea class="form-control" id="item_notes" name="item_notes" >{{$items->item_name}}</textarea>
						<br>
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
