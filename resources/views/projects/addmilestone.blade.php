@extends('layout.app')
@section('content')
	{!! Form::open(['action' => 'MilestoneProjectsController@store', 'method' => 'POST',
			'class' => 'panel-body col-lg-12 form'])!!}
					<div class="form-group col-lg-12" id="addmilestone">
										<div class="table-responsive">
												 <table class="table table-hover" id="dynamic_field_milestone">
													 		<thead>
																<th><label class="control-label" for="milestone_name">Name</label></th>
																<th><label class="control-label" for="milestone_status">Status</label></th>
															</thead>
															<tr>
																<td><input type="text"  id="milestonename" name="milestone_name[]" placeholder="Enter Milestone name" class="form-control"></td>
																<td><input type="text" id="milestonestatus" name="milestone_status[]" class="form-control" value="Ongoing" disabled></td>
																
																<td><button type="button" name="addmilestone" id="addmilestone" class="btn btn-success btn-block">Add More</button></td>
															</tr>
												 </table>
										</div>
					</div>
					 <button type="submit" class="btn btn-primary">Save</button>
			{!! Form::close() !!}

@endsection
