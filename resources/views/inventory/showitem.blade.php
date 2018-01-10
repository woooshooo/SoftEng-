@extends('layout.app')
@section('content')
  <div class="container col s12 m6" style="height:100px">
    <h4>Item Description</h4>
    <br>
    <div class="card-panel grey lighten-1 z-depth-5 col s9" style="height:auto; margin:2px; border-radius:10px;">

       <p class="flow-text">Name: {{$items->item_name}}</p>
       <p class="flow-text">Type: {{$items->item_type}}</p>
       <p class="flow-text">Total Quantity: {{$items->item_quantity}}</p>
       <p class="flow-text">In Stock:
         @foreach ($totalBorrowed as $value)
           @if ($value->equipment_id == $items->equipment_id)
             {{$items->item_quantity - $value->sum}}
           @endif
         @endforeach</p></p>
       <p class="flow-text">Borrowed:
         @foreach ($totalBorrowed as $value)
          @if ($value->equipment_id == $items->equipment_id)
            {{$value->sum}}
          @endif
         @endforeach</p>
       <table class="centered bordered responsive-table highlight grey darken-1 z-depth-5" style="margin:2px; border-radius:10px;">
         <thead>
           <tr>
             <th>Name</th>
             <th>Qty Borrowed</th>
           </tr>
         </thead>

       @foreach ($borrowedBy as $value)
         @if ($value->equipment_id == $items->equipment_id)
           <tr>
           <td>{{$value->firstname}} {{$value->lastname}}</td>
           <td>{{$value->qtyBorrowed}}</td>
           <tr>
         @endif
       @endforeach

     </table>
       <p class="flow-text">Notes:<br>{{$items->item_notes}}</p>
       <p class="flow-text"><a href="/items/{{$items->equipment_id}}/edit" class="btn btn-small grey darken-1  z-depth-2">Edit</a></p>
       {!!Form::open(['action'=> ['ItemsController@destroy', $items->equipment_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-small grey darken-1  z-depth-2' ])}}
       {!!Form::close()!!}
   </div>

    <br>
  </div>
</div>
@endsection
