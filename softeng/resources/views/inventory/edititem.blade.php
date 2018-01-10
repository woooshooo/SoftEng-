@extends('layout.app')
@section('content')
		<div class="container s9 m9 l9">
      <h1>{{$title}}</h1>
			{!! Form::open(['action' => ['ItemsController@update',$items->equipment_id], 'method' => 'POST',
				'class' => 'form grey darken-1 z-depth-5', 'style' => 'padding:30px; border-radius:20px;'])!!}
				<div class="input-field col s3">
					<input type="text" class="validate" id="item_name" name="item_name" value="{{$items->item_name}}">
					<label for="item_name">Equipment Name</label>
				</div>
				<div class="input-field col s3">
					<input type="text" class="validate" id="item_kind" name="item_type" value="{{$items->item_type}}">
					<label for="item_type">Type of Equipment</label>
				</div>
				<div class="input-field col s3">
					<input type="number" class="validate" id="item_quantity" name="item_quantity" value="{{$items->item_quantity}}">
					<label for="item_quantity">Quantity</label>
				</div>
				<div class="input-field col s3">
					<textarea class="materialize-textarea" id="item_notes" name="item_notes">{{$items->item_notes}}</textarea>
					<label for="item_notes">Input additional notes here.</label>
				</div>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit
			  </button>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset
			  </button>
      {{Form::hidden('_method','PUT')}}
			{!! Form::close() !!}
    </div>
@endsection
