@extends('layout.app')
@section('content')
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Add Equipment</h1>
					</div>
					<!-- /.col-lg-12 -->
			</div>
			{!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST',
				'class' => 'col-lg-12 form'])!!}
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
				<div class="form-group col-lg-12">
					<label class="control-label" for="item_notes">Input additional notes here.</label>
					<textarea class="form-control" id="item_notes" name="item_notes"></textarea>
					<br>
				</div>
				<div class="form-group col-lg-12">
					<button class="btn btn-default" type="submit" name="action">Submit
				  </button>
					<button class="btn btn-default" type="reset" name="action">Reset
				  </button>
				</div>
			{!! Form::close() !!}
@endsection
