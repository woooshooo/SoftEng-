<!DOCTYPE html>
<html>
	<head>
		<title>Add Profile</title>
		<!-- Compiled and minified CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
			<style>
			.btn-small {
	 height: 24px;
	 line-height: 24px;
	 padding: 0 0.5rem;
}
			</style>
	</head>
	<body class="grey"style="padding-left:200px">
				@include('navbar')
		<div class="container">
			<h4>Add Staff Profile</h4>
			<form class="form grey darken-1 z-depth-5" style="padding:30px; border-radius:20px;">
				First Name:<br>
				<input type="text" name="fname"><br>
				Middle Initial:<br>
				<input type="text" name="mname"><br>
				Last Name:<br>
				<input type="text" name="lname"><br>
				Course/Strand:<br>
				<input type="text" name="course"><br>
				Year Level/Grade:
				<a class='dropdown-button btn btn-small black waves-effect waves-light z-depth-5' href='#' data-activates='dropdown1'>Year Level/Grade</a>
				<!-- Dropdown Structure -->
				<ul id='dropdown1' class='dropdown-content'>
					<li><a class="black-text" href="#!">Grade 11</a></li>
					<li><a class="black-text"href="#!">Grade 12</a></li>
					<li class="divider black-text"></li>
					<li><a class="black-text"href="#!">1</a></li>
					<li><a class="black-text"href="#!">2</a></li>
					<li><a class="black-text"href="#!">3</a></li>
					<li><a class="black-text"href="#!">4</a></li>
					<li><a class="black-text"href="#!">5</a></li>
				</ul><br><br>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit</button>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset</button>
		</form>
		</div>
	</body>
	<!-- Compiled and minified JavaScript -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script>$('.dropdown-button').dropdown('open');</script>
	<script>
  $(document).ready(function(){
   $('.collapsible').collapsible();
 });</script>
</html>
