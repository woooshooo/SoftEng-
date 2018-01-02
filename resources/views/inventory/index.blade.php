@extends('layout.app')
@section('content')
			<div class="container">
				<h4>Equipment Inventory</h4>

				<table class="centered bordered responsive-table highlight grey darken-1 z-depth-5" style="margin:2px; border-radius:10px;">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Type</th>
  						<th>Total Quantity</th>
  						<th>Available</th>
  						<th>Borrowed</th>
  						<th>Notes</th>
              <th></th>
            </tr>
        </thead>
				@foreach ($items as $value)
						<tr class="clickable-row" data-href="/items/{{$value->equipment_id}}">
								<td>{{$value->item_name}}</td>
								<td>{{$value->item_type}}</td>
								<td>{{$value->item_quantity}}</td>
								<td>{{$value->item_quantity}}</td>
								<td>{{$value->borrow['qtyBorrowed']}}</td>
								<td>{{$value->item_notes}}</td>
								<td><a href="/items/{{$value->equipment_id}}/edit" class="btn btn-small grey darken-1  z-depth-2">Edit</a></td>
								<td><a href="/borrows/{{$value->equipment_id}}" class="btn btn-small grey darken-1  z-depth-2">Borrow</a></td>
						</tr>
				@endforeach

				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('additem')}}">Add Equipment</a>
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('borrows')}}">Borrow Equipment</a>
				</div>
			</div>
	</div>
@endsection
