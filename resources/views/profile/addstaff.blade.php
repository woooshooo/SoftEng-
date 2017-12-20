@extends('layout.app')
@section('content')
		<div class="container">
			<h4>Add Staff Profile</h4>
			<form class="form grey darken-1 z-depth-5" style="padding:30px; border-radius:20px;">
				First Name:<br>
				<input type="text" name="fname"><br>
				Middle Initial:<br>
				<input type="text" name="mname"><br>
				Last Name:<br>
				<input type="text" name="lname"><br>
				Under Course/Strand:<br>
				<input type="text" name="course"><br>
				Add more detail here
				<br><br>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit</button>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset</button>
		</form>
		</div>
@endsection
