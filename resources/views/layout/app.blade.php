<?php
use Illuminate\Support\Facades\Auth;
use App\Projects;
use App\Events;
use App\Staffs;
use App\Vols;
use App\Profile;

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
      .noprint {display:none;}
      }

      @media screen
      {
      }

      .ui-front {
        z-index:1001;
      }
      .modal-backdrop {
        visibility: hidden !important;
      }
      .modal.in {
        background-color: rgba(0,0,0,0.5);
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
<script src="{{ asset('datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('datatables-responsive/dataTables.responsive.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/sb-admin-2.js')}}"></script>
<!-- fullCalendar -->
<script src={{asset('fullcalendar-3.8.0/fullcalendar.js')}}></script>
<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
        dayClick: function() {
        alert('a day has been clicked!');
    }
    })

});
</script>
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
				responsive: true
		});
    $('#dataTables').DataTable({
				responsive: true
		});
    $('#dataTables-forms').DataTable({
				responsive: true
		});
    $('#dataTables-items').DataTable({
				responsive: true
		});
    $('#dataTables-record').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
    $('#dataTables-viewrecord').DataTable( {
        "order": [[ 5, "desc" ]]
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
         $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="item_name[]" placeholder="Enter Name" class="form-control"></td><td><input type="text" id="searchItemType'+i+'" name="item_type[]" placeholder="Enter Type" class="form-control"></td><td><input type="text"  name="item_code[]" placeholder="Enter Code" class="form-control"</td><td><input type="text"  name="item_warranty[]" placeholder="Enter Warranty"class="form-control"</td><td><input type="text"  name="item_desc[]" placeholder="Enter Description" class="form-control"</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
         $( '#searchItemType'+i+'' ).autocomplete({
           source: 'http://localhost:8000/searchItemType'
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

    $('#myModal').modal(options)
});
</script>

<!-- ADDING MORE Equipment-->
<script>
$(document).ready(function(){
    var i=1;
    $('#addborrow').click(function(){
         i++;
         $('#dynamic_field_borrow').append('<tr id="row'+i+'"><td><input type="text" id="searchItemCode'+i+'" name="item_code[]" placeholder="Enter Item Code"class="form-control"</td><td><input type="text" id="searchItem'+i+'" name="item_name[]" placeholder="Enter Equipment Name" class="form-control"></td><td><input type="number" name="numberofdays[]"  placeholder="Enter Days" class="form-control"></td><td><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
         $( '#searchItem'+i+'' ).autocomplete({
           source: 'http://localhost:8000/searchItem'
         });
         $( '#searchItemCode'+i+'').autocomplete({
           source: 'http://localhost:8000/searchItemCode'
         });
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
$( function() {
  $( "#searchItem" ).autocomplete({
    source: 'http://localhost:8000/searchItem'
  });
});
$( function() {
  $( "#searchItemType" ).autocomplete({
    source: 'http://localhost:8000/searchItemType'
  });
});
$( function() {
  $( "#searchProfilee" ).autocomplete({
    source: 'http://localhost:8000/searchProfile'
  });
});
$( function() {
  $( "#searchProfile" ).autocomplete({
    source: 'http://localhost:8000/searchProfile'
  });
});
$( function() {
  $( "#searchItemCode" ).autocomplete({
    source: 'http://localhost:8000/searchItemCode'
  });
});

</script>

<script>

$('#listallborrowed').on('hidden.bs.modal', function (event) {
  if ($('.modal:visible').length) {
    $('body').addClass('modal-open');
  }
});

</script>






<!-- To change progress bar width (inline style) -->
<script>

//To change progress bar width (inline style)
$(document).ready(function(){
  $('#projProgBar').css('width', '100%');
});

</script>

<script>
  //count checkboxes in div where milestones are
  $(document).ready(function(){
    var checkboxes = $('#milestonesform label input[type="checkbox"]');
    checkboxes.change(function(){
      var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
      $('#count-checked-checkboxes').value(countCheckedCheckboxes);
    });
  });

</script>

</html>
