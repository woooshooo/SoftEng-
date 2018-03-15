
<?php
use Illuminate\Support\Facades\Auth;
use App\Projects;
use App\Events;
use App\Staffs;
use App\Vols;
use App\Profile;
use App\ItemDetails;
use App\MilestoneProjects;
use App\ProfileEventsWorked;
use App\ProfileEventsAssigned;
use App\EventsAssigned;
use App\EventsWorked;
use App\EventsRank;
$milestones = MilestoneProjects::all();
$eventsassigned = EventsAssigned::all();
$eventsworked = EventsWorked::all();
$itemdetails = ItemDetails::all();
// $projects = Projects::all();
$vols = Vols::all();
$profiles = Profile::all();
$id = Auth::id();
$user = Staffs::find($id)->profile;
$sum = DB::select('select equipment_details_id, item_name, sum(quantity_borrowed) as sumOf from sumofBorrowed group by equipment_details_id');
?>

<html>
	<head>
		@if ($title == 'Rankings')
			<title>Dashboard</title>
		@else
			<title>{{$title}}</title>
		@endif


		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Webster Kyle Genise">

		<!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('metisMenu/metisMenu.min.css')}}" rel="stylesheet">
			<!-- ajax -->
		{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
    <!-- JQUERY UI -->
    <link href="{{ asset('jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
		<link href="{{asset('datatables/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
		<link href="{{asset('datatables/css/buttons.dataTables.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <style type="text/css">
      @media print
      {
      .noprint {
				display:none;
			}
      }
			.scrollbox {
			  height:200px;
				width:100%;
			  overflow-x:hidden;
				overflow-y:scroll;
			}
			</style>
  </head>


	<body>
		@include('inc/navbar')
		<div id="page-wrapper">
      @include('inc/messages')
			@yield('content')
		</div>
	</body>
	<!-- Compiled and minified JavaScript -->
<!-- jQuery -->
<script src="{{ asset('jquery/jquery.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{ asset('jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<!-- jQuery Autocomplete -->
<script src="{{ asset('js/jquery.autocomplete.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>


<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('metisMenu/metisMenu.min.js')}}"></script>
{{--
<!-- Morris Charts JavaScript -->
<script src="{{ asset('raphael/raphael.min.js')}}"></script>
<script src="{{ asset('morrisjs/morris.min.js')}}"></script>
<script src="{{ asset('data/morris-data.js')}}"></script> --}}
<!-- DataTables JavaScript -->
<script type="text/javascript" src="{{ asset('datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/buttons.print.min.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/sb-admin-2.js')}}"></script>
<!-- clickable row -->
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<!-- DATATABLES JSCRIPT-->
<script>
$(document).ready(function() {
		$('#dataTables-example').DataTable({
			dom: 'fBrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
		$('#dataTables-projrank').DataTable({
			dom: 'Brtp',
			buttons: [{
                extend: 'excel',
                filename: 'Project Rankings',
								title: 'Rankings',
								messageTop: 'Rankings of most number of Projects worked'
            },
            {
                extend: 'pdf',
                filename: 'Project Rankings',
								title: 'Rankings',
								messageTop: 'Rankings of most number of Projects worked',
            }
		]
		});
		$('#dataTables-eventrank').DataTable({
			dom: 'Brtp',
			buttons: [{
                extend: 'excel',
                filename: 'Event Rankings',
								title: 'Rankings',
								messageTop: 'Rankings of most number of Events worked'
            },
            {
                extend: 'pdf',
                filename: 'Event Rankings',
								title: 'Rankings',
								messageTop: 'Rankings of most number of Events worked',
            }
		]
		});
    $('#dataTables').DataTable({
			dom: 'fBrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
    $('#dataTables-forms').DataTable({
			dom: 'fBrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
    $('#dataTables-items').DataTable({
			dom: 'fBrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
    $('#dataTables-record').DataTable( {
        "order": [[ 3, "desc" ]],
				dom: 'fBrtip',
				buttons: [
					'excel', 'pdf', {
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false
	        }
			]
    } );
    $('#dataTables-viewrecord').DataTable( {
        "order": [[ 5, "desc" ]],
				dom: 'fBrtip',
				buttons: [
					'excel', 'pdf', {
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false
	        }
			]
    } );
		$('#dataTables-projectitems').DataTable( {
      	dom: 'fBrtip',
				buttons: [
					'excel', 'pdf', {
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false
	        }
			]
    } );
		$('#dataTables-eventitems').DataTable( {
      	dom: 'fBrtip',
				buttons: [
					'excel', 'pdf', {
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false
	        }
			]
    } );
		$('#dataTables-vols').DataTable( {
      	dom: 'fBrtip',
				buttons: [
					{
	            extend: 'excel',
	            filename: 'AllAssigned',
							title: 'All Assigned',
							messageTop: 'All Volunteers Assigned',
	        },
					{
	            extend: 'pdf',
							filename: 'AllAssigned',
							title: 'All Assigned',
							messageTop: 'All Volunteers Assigned',
	        },
					{
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false,
							filename: 'AllAssigned',
							title: 'All Assigned',
							messageTop: 'All Volunteers Assigned',
	        }

			]
    } );
		$('#dataTables-vols2').DataTable( {
      	dom: 'fBrtip',
				buttons: [
					{
	            extend: 'excel',
	            filename: 'AllWorked',
							title: 'All Worked',
							messageTop: 'All Volunteers Worked',
	        },
					{
	            extend: 'pdf',
							filename: 'AllWorked',
							title: 'All Worked',
							messageTop: 'All Volunteers Worked',
	        },
					{
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false,
							filename: 'AllWorked',
							title: 'All Worked',
							messageTop: 'All Volunteers Worked',
	        }

			]
    } );
		$('#dataTables-projects').DataTable( {
				"order": [[ 3, "desc" ]],
      	dom: 'fBrtip',
				buttons: [
					{
	            extend: 'excel',
	            filename: 'AllProjects',
							title: 'Projects',
							messageTop: 'All Projects',
	        },
					{
	            extend: 'pdf',
	            filename: 'AllProjects',
							title: 'Projects',
							messageTop: 'All Projects',
	        },
					{
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false,
							filename: 'AllProjects',
							title: 'Projects',
							messageTop: 'All Projects',
	        }

			]
    } );
		$('#dataTables-events').DataTable( {
				"order": [[ 3, "desc" ]],
      	dom: 'fBrtip',
				buttons: [
					{
	            extend: 'excel',
	            filename: 'AllEvents',
							title: 'Events',
							messageTop: 'All Events',
	        },
					{
	            extend: 'pdf',
	            filename: 'AllEvents',
							title: 'Events',
							messageTop: 'All Events',
	        },
					{
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false,
							filename: 'AllEvents',
							title: 'Events',
							messageTop: 'All Events',
	        }

			]
    } );
});
</script>
<!-- Page-Level Demo Scripts - Notifications - Use for reference -->
<script>
// tooltip demo
$('.tooltip-demo').tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
})
// popover demo
$("[data-toggle=popover]")
		.popover()
</script>
<script>
		$('.datepicker').datepicker({
			autoclose: true,
		});

</script>
<!-- ADDING MORE Equipment-->
<script>
$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
         i++;
         $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="item_name[]" placeholder="Enter Name" class="form-control"></td><td><input type="text" id="searchItemType'+i+'" name="item_type[]" placeholder="Enter Type" class="form-control"></td><td><input type="text"  name="item_code[]" placeholder="Enter Code" class="form-control"</td><td><input type="number"  name="item_quantity[]" class="form-control" value="1"</td><td><input type="text"  name="item_warranty[]" placeholder="Enter Warranty"class="form-control"</td><td><input type="text"  name="item_desc[]" placeholder="Enter Description" class="form-control"</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
         $( '#searchItemType'+i+'').autocomplete({
           source: '/searchItemType'
         });
				 $( "#searchProfile").autocomplete({
			     source: '/searchProfile'
			   });
    });
    $(document).on('click', '.btn_remove', function(){
         var button_id = $(this).attr("id");
         $('#row'+button_id+'').remove();
    });


});
</script>

<script>
$(document).ready(function() {
  $( "#searchItem" ).autocomplete({
    source: '/searchItem'
  });
	$( "#searchItemType" ).autocomplete({
		source: "/searchItemType"
	});
	$( "#searchProfilee" ).autocomplete({
    source: '/searchProfile'
  });
	$( "#searchProfile" ).autocomplete({
    source: '/searchProfile'
  });
	$( "#searchItemCode" ).autocomplete({
		source: '/searchItemCode'
	});
});
</script>
<!-- my ajax auto complete name for choosing tiem code-->
<script>
$(document).ready(function() {
var x = 1;
var option = "";
var maxvalue = "";

$('.qtytoBorrow').empty();
$(".itemCode").change(function(){
  var id = $("#itemCode").val();
  option = "";
	maxvalue = "";
  $('.item_name').empty();
  if (id){
    $.ajax({
      url:"/getItemName/"+id,
      type: "GET",
      data:{'id':id},
      success:function(response){
				console.log(response);
				console.log("This is the length "+response["itemnames"].length);
				console.log("This is the max value "+response["diff"][0]);
				console.log("This is the item name "+response["itemnames"][0].item_name);
				for(x = 0; x < response["itemnames"].length;  x++){
					option += "<option value='"+ response["itemnames"][x].item_name+"'>"+response["itemnames"][x].item_name+"</option>";
					maxvalue += response["diff"][0];
				}
        $('.item_name').append(option);
				$('.qtytoBorrow').attr({
		       "max" : maxvalue,
					 "min" : 1
		    });

      },
      error: function(data){
        console.log(data);
      }
    });
  }
});
});
</script>

{{-- ajax for milestone project --}}
<script>
  $(document).ready(function(){
		$('form').on('change', '#milestone_project',function() {
			var milestone_projects_id = this.value;
  		console.log("checkbox clicked "+milestone_projects_id);
			$.ajax({
	      url:"/changeMilestoneStatus/"+milestone_projects_id,
	      type: "GET",
	      data:{'milestone_projects_id':milestone_projects_id},
	      success:function(response){
					console.log(response);
					console.log("projects");
					location.reload();
	      },
	      error: function(data){
	        console.log(data);
	      }
	    });
		});
{{-- ajax for milestone events --}}
		$('form').on('change', '#milestone_event',function() {
			var milestone_events_id = this.value;
  		console.log("checkbox clicked "+milestone_events_id);
			$.ajax({
	      url:"/changeMilestoneStatusE/"+milestone_events_id,
	      type: "GET",
	      data:{'milestone_events_id':milestone_events_id},
	      success:function(response){
					console.log(response);
					console.log("events");
					location.reload();
	      },
	      error: function(data){
	        console.log(data);
	      }
	    });
		});
  });


</script>

<!-- Adding milestones-->


<script>
$(document).ready(function(){
    var i=1;
    $('#addmilestone').click(function(){
         i++;
         $('#dynamic_field_milestone').append('<tr id="row'+i+'"><td><input type="text" id="milestonename" name="milestone_name[]" placeholder="Enter Milestone name" class="form-control"></td><td><input type="date"  name="milestone_deadline[]" placeholder="Enter Deadline" class="form-control"></td><td><input type="text" name="milestone_status[]" class="form-control" value="Ongoing" disabled><input type="hidden" name="milestone_status[]" value="Ongoing"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function(){
         var btn_id = $(this).attr("id");
         $('#row'+btn_id+'').remove();
    });
});
</script>



{{-- <footer class="pull-right">
	Copyright © 2018 Software Engineering Requirement | Developed by TeamPura | Coded by Webster Kyle Genise
</footer> --}}
<!-- ADDING MORE Borrow-->
<script type="text/javascript">
$(document).ready(function(){
    var i=1;
		var maxvalue ="";

    $('#addborrow').click(function(){
			console.log('addborrow clicked');
         i++;
         $('#dynamic_field_borrow').append('<tr id="row'+i+'"><td><select name="item_code[]" id="itemCode'+i+'" class="form-control itemCode'+i+'" required>@foreach($itemdetails as $key => $value)@if ($value->item_status == "AVAILABLE")<option value="{{$value->item_code}}">{{$value->item_code}}@endif</option>@endforeach</select></td><td><select name="item_name[]" class="form-control item_name'+i+'"required></select></td><td><input type="number"  name="quantity_borrowed[]" placeholder="Enter Quantity" class="form-control qtytoBorrow'+i+'" required></td><td><input type="number" name="numberofdays[]"  placeholder="Enter Days" class="form-control" required></td><td><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');

         $(".itemCode"+i).change(function(){
           var id = $("#itemCode"+i).val();
					 // Validating same Item
					 for (var q = 0; q < i; q++) {
					 	if (id == $("#itemCode"+q).val() || id == $("#itemCode").val() ) {
							console.log('Deleting Duplicate Item..');
		          $('#row'+i+'').remove();
					 		console.log('Duplicate Item Deleted');
					 	}
					 }
					 // End of Validating Same Item
           console.log(id);
           options = "";
					 maxvalue ="";
           $('.item_name'+i).empty();
           if (id){
             $.ajax({
               url:"/getItemName/"+id,
               type: "GET",
               data:{'id':id},
               success:function(response){
                 console.log(response);
								 console.log("This is the length "+response["itemnames"].length);
								 console.log("This is the max value "+response["diff"][0]);
								 console.log("This is the item name "+response["itemnames"][0].item_name);
                 for(x = 0; x < response["itemnames"].length;  x++){
                   options += "<option value='"+ response["itemnames"][x].item_name+"'>"+response["itemnames"][x].item_name+"</option>";
									 maxvalue += response["diff"][0];
                 }
                 $('.item_name'+i).append(options);
								 $('.qtytoBorrow'+i).attr({
				 		       "max" : maxvalue,
				 					 "min" : 1
				 		    });
               },
               error: function(data){
                 console.log(data);
               }
             });
           }
         });
    });
    $(document).on('click', '.btn_remove', function(){
         var button_id = $(this).attr("id");
         $('#row'+button_id+'').remove();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#showerank").click(function(){
        $("#erank").fadeToggle("fast");
				if ($("#showerank").html() == "Show Rankings") {
					$("#showerank").text("Hide");
				} else {
					$("#showerank").text("Show Rankings");
				}

    });
		$("#showprank").click(function(){
        $("#prank").fadeToggle("fast");
				if ($("#showprank").html() == "Show Rankings") {
					$("#showprank").text("Hide");
				} else {
					$("#showprank").text("Show Rankings");
				}
    });
});
</script>


{{--  add volunteer for events_worked--}}
<script>
$(document).ready(function(){
		var x=1;
		function getSum(total, num) {
				return total + num;
		}
		$("form").on('change','#volName',function(){
			console.log("changed");
			var id = $("#volName").val();
			var eventphaseval = $("#eventphaseID").val();
			$("#eventphaseID").val(eventphaseval);
		});
		$('#addvolunteersbtn2').click(function(){
				$('#dynamic_field_addvolunteer2').append('<tr id="row'+x+'"><td><select name="volunteers[]" id="volName'+x+'" class="form-control volName'+x+'" >@foreach($profiles as $profile)@foreach($vols as $vol)@if($profile->profile_id == $vol->profile_id)<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>@endif @endforeach @endforeach</select></td><td><select class="selectpicker" name="eventphase[]" id="eventphaseID'+x+'" ><option value="1">Pre Setup</option><option value="2">Actual Event</option><option value="3">Pack Up</option><option value="4">Pre Setup, Pack Up</option><option value="5">Actual Event, Pack Up</option><option value="6">Pre Setup, Actual Event,Pack Up</option></select></td><td><button type="button" name="remove" id="'+x+'" class="btn btn-danger btn_remove1 btn-block">Remove</button></td></tr>');
				$('.selectpicker').selectpicker('render');
				console.log("Added "+$("#volName").val());
			x++;
				 $("#volName"+x).change(function(){
					 var id = $("#volName"+x).val();
					 // Validating same Item
					 for (var q = 0; q < x; q++) {
						if (id == $("#volName"+q).val() || id == $("#volName").val() ) {
							console.log('Deleting Duplicate Item..');
							$('#row'+x+'').remove();
							console.log('Duplicate Item Deleted');

						}
					 }
					 // End of Validating Same Item
				 });

		});

		$(document).on('click', '.btn_remove1', function(){
				 var btn_id = $(this).attr("id");
				 $('#row'+btn_id+'').remove();
		});
});
</script>

<script>
$(document).ready(function(){
		var x=1;
		function getSum(total, num) {
		    return total + num;
		}
		$("form").on('change','#volName',function(){
			console.log("changed");
			var id = $("#volName").val();
			var eventphaseval = $("#eventphaseID").val();
			$("#eventphaseID").val(eventphaseval);
		});
		$('#addvolunteersbtn3').click(function(){
				$('#dynamic_field_addvolunteer3').append('<tr id="row'+x+'"><td><select name="volunteers[]" id="volName'+x+'" class="form-control volName'+x+'" >@foreach($profiles as $profile)@foreach($vols as $vol)@if($profile->profile_id == $vol->profile_id)<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>@endif @endforeach @endforeach</select></td><td><select class="selectpicker" name="eventphase[]" id="eventphaseID'+x+'" ><option value="1">Pre Setup</option><option value="2">Actual Event</option><option value="3">Pack Up</option><option value="4">Pre Setup, Pack Up</option><option value="5">Actual Event, Pack Up</option><option value="6">Pre Setup, Actual Event,Pack Up</option></select></td><td><button type="button" name="remove" id="'+x+'" class="btn btn-danger btn_remove1 btn-block">Remove</button></td></tr>');
				$('.selectpicker').selectpicker('render');
				console.log("Added "+$("#volName").val());
			x++;
				 $("#volName"+x).change(function(){
           var id = $("#volName"+x).val();
					 // Validating same Item
					 for (var q = 0; q < x; q++) {
						if (id == $("#volName"+q).val() || id == $("#volName").val() ) {
							console.log('Deleting Duplicate Item..');
							$('#row'+x+'').remove();
							console.log('Duplicate Item Deleted');

						}
					 }
					 // End of Validating Same Item
				 });

		});

		$(document).on('click', '.btn_remove1', function(){
				 var btn_id = $(this).attr("id");
				 $('#row'+btn_id+'').remove();
		});
});
</script>




<!-- ADDING USED ITEM-->
<script type="text/javascript">
$(document).ready(function(){
		var i=1;
		$('table').on('click','#adduseditem',function(){
			console.log('adduseditem clicked');
				 i++;
				 $('#dynamic_field_additem').append('<tr id="row'+i+'"><td><select name="item_code[]" id="itemCode'+i+'" class="form-control itemCode'+i+'" required>@foreach($itemdetails as $key => $value)@if ($value->item_status == "AVAILABLE")<option value="{{$value->item_code}}">{{$value->item_code}}@endif</option>@endforeach</select></td><td><select name="item_name[]" class="form-control item_name'+i+'"required></select></td><td><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');

				 $(".itemCode"+i).change(function(){
					 var id = $("#itemCode"+i).val();
					 // Validating same Item
					 for (var q = 0; q < i; q++) {
						if (id == $("#itemCode"+q).val() || id == $("#itemCode").val() ) {
							console.log('Deleting Duplicate Item..');
							$('#row'+i+'').remove();
							console.log('Duplicate Item Deleted');
						}
					 }
					 // End of Validating Same Item
					 console.log(id);
					 options = "";
					 $('.item_name'+i).empty();
					 if (id){
						 $.ajax({
							 url:"/getItemName/"+id,
							 type: "GET",
							 data:{'id':id},
							 success:function(response){
								 console.log(response);
								 console.log("This is the length "+response["itemnames"].length);
								 console.log("This is the max value "+response["diff"][0]);
								 console.log("This is the item name "+response["itemnames"][0].item_name);
								 for(x = 0; x < response["itemnames"].length;  x++){
									 options += "<option value='"+ response["itemnames"][x].item_name+"'>"+response["itemnames"][x].item_name+"</option>";
								 }
								 $('.item_name'+i).append(options);
							 },
							 error: function(data){
								 console.log(data);
							 }
						 });
					 }
				 });
		});
		$(document).on('click', '.btn_remove', function(){
				 var button_id = $(this).attr("id");
				 $('#row'+button_id+'').remove();
		});
});
</script>

</html>
