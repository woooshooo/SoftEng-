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
              <th></th>
            </tr>
        </thead>

				@foreach ($items as $value)
						<tr class="clickable-row" data-href="/items/{{$value->equipment_id}}">
								<td>{{$value->item_name}}</td>
								<td>{{$value->item_type}}</td>
								<td>{{$value->item_quantity}}</td>
								<td>{{$value->item_quantity - $avails}}</td>
								<td>{{$value->borrow['qtyBorrowed']}}</td>
								<td><a href="/borrows/{{$value->equipment_id}}" class="btn btn-small grey darken-1  z-depth-2">Borrow</a></td>
						</tr>
				@endforeach
			</div>
	</div>
@endsection
