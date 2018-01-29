@extends('layout.app')
@section('content')
				<div class="panel-body">
					<div class="panel-heading">
						<h1>Projects</h1>
					</div>
            <table class="table table-bordered table-hover table-responsive" id="dataTables-example">
                <thead>
                    <tr>
                    <th>Project Name</th>
                    <th>Client</th>
										<th>Start Date</th>
										<th>End Date</th>
                    <th>Status</th>
                    </tr>
                </thead>
								@foreach ($projects as $value)
										<tr class="clickable-row" data-href="/projects/{{$value->projects_id}}">
												<td>{{$value->projects_name}}</td>
												<td>{{$value->projects_client}}</td>
												<td>{{$value->projects_startdate}}</td>
												<td>{{$value->projects_deadline}}</td>
												<td>{{$value->projects_status}}</td>
												
										</tr>
								@endforeach
            </table>

        </div>
@endsection
