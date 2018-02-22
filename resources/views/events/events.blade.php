@extends('layout.app')
@section('content')
	<?php
	 	use App\Events;
		use App\Staffs;
		use App\Profile;
		use App\ProfileEvents;
	?>
		<div class="container">
            <h1 class="page-header">Events</h1>
            <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>Event Name</th>
                    <th>Client</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    </tr>
                </thead>
								@foreach ($events as $value)
										<tr class="clickable-row" data-href="/events/{{$value->events_id}}">
												<td>{{$value->events_startdate}}</td>
												<td>{{$value->events_name}}</td>
												<td>{{$value->events_clients}}</td>
												<td>{{$value->events_deadline}}</td>
												<td>{{$value->events_status}}</td>

										</tr>
								@endforeach
            </table>
        </div>
@endsection
