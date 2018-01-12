@extends('layout.app')
@section('content')
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Viewing Equipment</h1>
					</div>
					<!-- /.col-lg-12 -->
			</div>
			{!! Form::open(['action' => ['ItemsController@update',$items->equipment_id], 'method' => 'POST',
				'class' => 'col-lg-12 form'])!!}
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
				<div class="form-group col-lg-12">
					<label class="control-label" for="item_notes">Additional notes here.</label>
					<textarea class="form-control" id="item_notes" name="item_notes" disabled>{{$items->item_name}}</textarea>
				</div>
				<div class="col-lg-6">
					<label>In Stock:</label>
	         @foreach ($totalBorrowed as $value)
	           @if ($value->equipment_id == $items->equipment_id)
							 <input type="number" class="form-control" value="{{$items->item_quantity - $value->sum}}" disabled>
	           @endif
	         @endforeach

       		<label>Borrowed:</label>
	         @foreach ($totalBorrowed as $value)
	          @if ($value->equipment_id == $items->equipment_id)
							<input type="number" class="form-control" value="{{$value->sum}}" disabled>

	          @endif
	         @endforeach
				 </div>
					<div class="well col-lg-6">
						 <div class="panel-heading">
							 Borrowers
 		 				 </div>
						 <div class="panel-body">
							  @foreach ($borrowedBy as $value)
				         @if ($value->equipment_id == $items->equipment_id)
									 {{$value->firstname}} {{$value->lastname}}  = {{$value->qtyBorrowed}} <br>
				         @endif
				       @endforeach
					 </div>
	 			 </div>
				<div class="form-group col-lg-12">
					<button class="btn btn-default" type="submit" name="action">Submit
				  </button>
					<button class="btn btn-default" type="reset" name="action">Reset
				  </button>
				</div>
      {{Form::hidden('_method','PUT')}}
			{!! Form::close() !!}
@endsection
