@extends('layout.app')
@section('content')
	<div id="wrapper">
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Viewing Equipment

								<label>Available:</label>
								 @foreach ($totalBorrowed as $value)
									 @if ($value->equipment_id == $items->equipment_id)
										 <span>{{$items->item_quantity - $value->sum}}</span>
									 @endif
								 @endforeach

								<label>Borrowed:</label>
								 @foreach ($totalBorrowed as $value)
									@if ($value->equipment_id == $items->equipment_id)
										<span>{{$value->sum}}</span>

									@endif
								 @endforeach

							</h1>
					</div>
					<!-- /.col-lg-12 -->

			{!! Form::open(['action' => ['ItemsController@update',$items->equipment_id], 'method' => 'POST',
				'class' => 'row panel panel-body col-lg-12 form'])!!}
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
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_code">Code</label>
					<input type="text" class="form-control" id="item_code" name="item_code" value="{{$items->item_code}}" disabled>

				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="item_notes">Additional notes here.</label>
					<textarea class="form-control" id="item_notes" name="item_notes" style="resize:none" disabled>{{$items->item_name}}</textarea>
				</div>

				<div class=" form-group col-lg-6">
					 <table class="well table table-bordered table-hover table-responsive">
						 <thead>
							 <tr>
								 <th>Borrowers</th>
								 <th>Quantity Borrowed</th>
							 </tr>
					 </thead>
					 @foreach ($borrowedBy as $value)
						@if ($value->equipment_id == $items->equipment_id)
							<tr>
							 <td>{{$value->firstname}} {{$value->lastname}} </td>
							 <td>{{$value->qtyBorrowed}} </td>
							</tr>
						@endif
					@endforeach
				</table>
				</div>
				{!!Form::open(['action'=> ['ItemsController@destroy', $items->equipment_id], 'method' => 'POST', 'class' => 'panel panel-body col-lg-12 form'])!!}
         {{Form::hidden('_method','DELETE')}}
				 <div class=" form-group col-lg-6" style="text-align:center"><br>
					 <a href="/items/{{$items->equipment_id}}/edit" class="btn btn-default">Edit</a>
				 @if ($items->item_status == 'UNAVAILABLE')
				 		{{Form::submit('MAKE AVAILABLE',['class' => 'btn btn-default' ])}}
					@else
						{{Form::submit('MAKE UNAVAILABLE',['class' => 'btn btn-default' ])}}
				 @endif
			 </div>
        {!!Form::close()!!}

		</div>
</div>

@endsection
