@extends('layout.app')
@section('content')
	<div class="row">
			<div class="col-lg-12">
					<h1 class="page-header">Borrow Equipment Form</h1>
			</div>
			<!-- /.col-lg-12 -->
	</div>
	{!! Form::open(['action' => 'BorrowsController@store', 'method' => 'POST','class' => 'col-lg-12 form', 'id' => 'add_item'])!!}

	<div class="form-group col-lg-6">
		<label class="control-label" for="borrower">Borrower</label>
		<input type="text" class="form-control" id="borrower" name="borrower">
	</div>
	<div class="form-group col-lg-12">
						<div class="table-responsive">
								 <table class="table table-bordered" id="dynamic_field">
									 		<thead>
												<th><label class="control-label" for="item_name">Equipment Name</label></th>
												<th><label class="control-label" for="qtyBorrowed">Qty Borrowed</label></th>
											</thead>
											<tr>
													 <td><input type="text" name="item_name[]" placeholder="Enter Equipment Name" class="form-control"></td>
													 <td><input type="number" name="qtyBorrowed[]"  placeholder="Quantiy to Borrow" class="form-control"></td>
													 <td><button type="button" name="add" id="add" class="btn btn-success btn-block">Add More</button></td>
											</tr>
								 </table>
								 <!--<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />-->
						</div>
	</div>
<!--
	<div class="form-group col-lg-6">
		<label class="control-label" for="item_name">Equipment Name</label>
		<input type="text" class="form-control" id="item_name" name="item_name">
	</div>

	<div class="form-group col-lg-6">
		<label class="control-label" for="qtyBorrowed">Qty Borrowed</label>
		<input type="number" class="form-control" id="qtyBorrowed" name="qtyBorrowed">
	</div>
-->
	<div class="form-group col-lg-12"></div>

	<div class="form-group col-lg-12">
		<label class="control-label" for="purpose">Purpose</label>
		<textarea class="form-control" name="purpose"></textarea>
	</div>


	<div class="form-group col-lg-12">
		<button class="btn btn-default" type="submit" name="action">Submit
		</button>
		<button class="btn btn-default" type="reset" name="action">Reset
		</button>
	</div>
	{!! Form::close() !!}
@endsection
