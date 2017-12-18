<!DOCTYPE html>
<html>
	<head>
		<title>Inventory</title>
		<!-- Compiled and minified CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
			 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			 <style>
			 .btn-small {
    height: 24px;
    line-height: 24px;
    padding: 0 0.5rem;
}
			 </style>
	</head>

	<!-- GOAL for Inventory System

	Add details of new equipment to system (name, kind, supplier)
	Updating quantity of items in office
	“In Stock” and “Borrowed” equipment views
	Updating if an item is “borrowed” or “in stock”
	If returned, date is recorded
	Indicating if an item is damaged, in repair, shipped to supplier, lost

-->
<body class="grey"style="padding-left:200px">
			@include('navbar')

		<div class="container s9 m9 l9">
      <h1>Add Item</h1>
			<form class="form grey darken-1 z-depth-5" style="padding:30px; border-radius:20px;">
				<div class="input-field col s3">
					<input type="text" class="validate" id="item_name">
					<label for="item_name">Equipment Name</label>
				</div>
				<div class="input-field col s3">
					<input type="text" class="validate" id="item_kind" name="item_kind">
					<label for="item_kind">Kind of Equipment</label>
				</div>
				<div class="input-field col s3">
					<input type="text" class="validate" id="item_supplier" name="item_supplier">
					<label for="item_supplier">Equipment Supplier</label>
				</div>
				<div class="input-field col s3">
					<textarea class="materialize-textarea" id="item_notes" name="item_notes"></textarea>
					<label for="item_notes">Input additional notes here.</label>
				</div>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit
			  </button>
				<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset
			  </button>
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
