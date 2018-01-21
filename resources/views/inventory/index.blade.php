@extends('layout.app')
@section('content')
			<div class="panel-body">
				<div class="panel-heading">
					<h1>Equipment Inventory</h1>
				</div>
				<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Status</th>
  						<th>Total Quantity</th>
  						<th>Available</th>
  						<th>Borrowed</th>
							<th></th>
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
									@else
										<td>{{$value->item_name}}</td>
										<td><font color="green">{{$value->item_status}}</font></td>
										<td>{{$value->item_quantity}}</td>
										<td>{{$value->available}}</td>
										<td>{{$value->borrowed}}</td>
									@endif
								<td><a href="/items/{{$value->equipment_id}}/edit" class="btn btn-default btn-block">Edit</a></td>
						</tr>
				@endforeach

				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-default btn-lg btn-inline" href="{{url('additem')}}">Add Equipment</a>
					<a class="btn btn-default btn-lg btn-inline" href="{{url('borrows')}}">Borrow Equipment</a>
				</div>
			</div>
@endsection
