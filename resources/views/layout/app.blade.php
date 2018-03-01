
<?php
use Illuminate\Support\Facades\Auth;
use App\Projects;
use App\Events;
use App\Staffs;
use App\Vols;
use App\Profile;
use App\ItemDetails;
use App\MilestoneProjects;


$id = Auth::id();
$user = Staffs::find($id)->profile;
?>

<html>
	<head>
		<title>{{$title}}</title>

		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

		<!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- MetisMenu CSS -->
    <link href="{{ asset('metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- JQUERY UI -->
    <link href="{{ asset('jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
		<link href="{{asset('datatables/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
		<link href="{{asset('datatables/css/buttons.dataTables.min.css')}}" rel="stylesheet">
		{{-- <link href="{{asset('datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet"> --}}

		{{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css	" rel="stylesheet" type="text/css"> --}}


    <!-- Morris Charts CSS -->
    <link href="{{ asset('morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

		<!-- ajax -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- date picker -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <!-- calendar -->
    <link rel='stylesheet' href={{asset('fullcalendar-3.8.0/fullcalendar.css')}} />
    <script src={{asset('fullcalendar-3.8.0/lib/jquery.min.js')}}></script>
    <script src={{asset('fullcalendar-3.8.0/lib/moment.min.js')}}></script>
    <style type="text/css">
      @media print
      {
      .noprint {
				display:none;
			}
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

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('metisMenu/metisMenu.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{ asset('raphael/raphael.min.js')}}"></script>
<script src="{{ asset('morrisjs/morris.min.js')}}"></script>
<script src="{{ asset('data/morris-data.js')}}"></script>
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
<!-- fullCalendar -->
<script src={{asset('fullcalendar-3.8.0/fullcalendar.js')}}></script>

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
			dom: 'Bfrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
    $('#dataTables').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
    $('#dataTables-forms').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'excel', 'pdf', {
            extend: 'print',
            text: 'Print',
            autoPrint: false
        }
		]
		});
    $('#dataTables-items').DataTable({
			dom: 'Bfrtip',
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
				dom: 'Bfrtip',
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
				dom: 'Bfrtip',
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
		$('#dataTables-vols').DataTable( {
      	dom: 'fBrtip',
				buttons: [
					'excel', 'pdf', {
	            extend: 'print',
	            text: 'Print',
	            autoPrint: false
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
           source: 'http://localhost:8000/searchItemType'
         });
				 $( "#searchProfile").autocomplete({
			     source: 'http://localhost:8000/searchProfile'
			   });
         //CREATE SEARCH ITEM TYPE
    });
    $(document).on('click', '.btn_remove', function(){
         var button_id = $(this).attr("id");
         $('#row'+button_id+'').remove();
    });
    $('#submit').click(function(){
         $.ajax({
              url:"/addborroweditem",
              method:"POST",
              data:$('#add_item').serialize(),
              success:function(data)
              {
                   alert(data);
                   $('#add_item')[0].reset();
              }
         });
    });

});
</script>

<script>
$(document).ready(function() {
  $( "#searchItem" ).autocomplete({
    source: 'http://localhost:8000/searchItem'
  });
	$( "#searchItemType" ).autocomplete({
    source: 'http://localhost:8000/searchItemType'
  });
	$( "#searchProfilee" ).autocomplete({
    source: 'http://localhost:8000/searchProfile'
  });
	$( "#searchProfile" ).autocomplete({
    source: 'http://localhost:8000/searchProfile'
  });
	$( "#searchItemCode" ).autocomplete({
		source: 'http://localhost:8000/searchItemCode'
	});
});
</script>
<!-- my ajax auto complete name for choosing tiem code-->
<script>
$(document).ready(function() {
var i = 1;
var option = "";
var maxvalue = "";
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
        for(i = 0; i < response.length;  i++){
          option += "<option value='" + response[i].item_name+"'>" + response[i].item_name+ "</option>";
					maxvalue += response[i].item_quantity;
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
		$('form').on('change', ':checkbox',function() {
			var milestone_projects_id = this.value;
  		console.log("checkbox clicked "+milestone_projects_id);
			$.ajax({
	      url:"/changeMilestoneStatus/"+milestone_projects_id,
	      type: "GET",
	      data:{'milestone_projects_id':milestone_projects_id},
	      success:function(response){
					console.log(response);
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
         $('#dynamic_field_milestone').append('<tr id="row'+i+'"><td><input type="text" id="milestonename" name="milestone_name[]" placeholder="Enter Milestone name" class="form-control"></td><td><input type="text" name="milestone_status[]" class="form-control" value="Ongoing" disabled><input type="hidden" name="milestone_status[]" value="Ongoing"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function(){
         var btn_id = $(this).attr("id");
         $('#row'+btn_id+'').remove();
    });
});
</script>
</html>
