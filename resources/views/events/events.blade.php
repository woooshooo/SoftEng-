@extends('layout.app')
@section('content')
		<div class="container">
            <h1 class="page-header">Events</h1>
            <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>Event Name</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th></th>
                    </tr>
                </thead>
            </table>
        </div>
@endsection
