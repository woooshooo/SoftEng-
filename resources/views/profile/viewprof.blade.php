@extends('layout.app')
@section('content')
	<body class="grey"style="padding-left:200px">
				@include('navbar')
			<div class="container">
				<h4>Student Volunteers</h4>

				<table class="centered bordered highlight grey darken-1 z-depth-5">
					<tr>
						<td>Name</td>
						<td>Course</td>
						<td>Year Level</td>
						<td>Cluster</td>
						<td>Email</td>
					</tr>

					<tr>
						<td>Alfonso Balao</td>
						<td>BS Information Technology</td>
						<td>3</td>
						<td>Productions</td>
					</tr>
					<tr>
						<td>Webster Genise</td>
						<td>BS Electrical Engineering</td>
						<td>5</td>
						<td>Creatives</td>
					</tr>
					<tr>
						<td>Jaemelli Naguiat</td>
						<td>BS Accounting Technology</td>
						<td>3</td>
						<td>Editorial</td>
					</tr>
					<tr>
							<td>Javin Rubillar</a></td>
							<td>AB IDS - Media & Technology</td>
							<td>4</td>
							<td>Editorial</td>
					</tr>
				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('viewstaff')}}">View Staff</a>
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('addvolunteer')}}">Add Volunteer</a>
				</div>
			</div>
	</div>

@endsection
