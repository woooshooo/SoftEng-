<!DOCTYPE html>
<html>
	<head>
		<title>Add Project</title>
		<!-- Compiled and minified CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

		</style>
	</head>
	<body class="grey"style="padding-left:200px">
				@include('inc/navbar')

			<div class="container s9 m9 l9">
	      <h1>Add Project</h1>
				<form class="form grey darken-1 z-depth-5" style="padding:30px; border-radius:20px;">
					<div class="input-field col s3">
						<input type="text" class="validate" id="project_name">
						<label for="project_name">Project Title</label>
					</div>
					<div class="input-field col s3">
						<input type="text" class="validate" id="client_name" name="client_name">
						<label for="client_name">Client Name</label>
					</div>
					<label for="cluster_name">Cluster/s Assigned</label>
					<div class="input-field col s3">
						<select id="cluster_name"class="input-field col s3" multiple>
							<option disabled selected>Choose your Cluster/s assigned</option>
							<option class="black-text" value="bpc">Broadcast & Productions Cluster</option>
							<option class="black-text" value="cc">Creative Cluster</option>
							<option class="black-text" value="esmc">Editorial & Social Media Cluster</option>
						</select>
					</div>
					<div class="input-field col s3">
						<textarea class="materialize-textarea" id="project_details" name="project_details"></textarea>
						<label for="project_details">Project Details</label>
					</div>
					<div class="input-field col s3">
						<input type="text" id="project_deadline" class="datepicker">
						<label for="project_deadline">Project Deadline</label>
					</div>
					<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit
				  </button>
					<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset
				  </button>
				</form>
	    </div>
	</form>
	</div>
  </body>
	<script>
  $(document).ready(function(){
   $('.collapsible').collapsible();
 });</script>
 <script>
 $(document).ready(function() {
 $('select').material_select();
});</script>
<script>
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
</script>
</html>
