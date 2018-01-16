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

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<!-- ajax -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


  </head>


	<body>
		@include('inc/navbar')
		<div id="page-wrapper">
			@include('inc/messages')
			@yield('content')
		</div>
	</body>
	<!-- Compiled and minified JavaScript -->
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<!-- jQuery -->
<script src="{{ asset('jquery/jquery.min.js')}}"></script>

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
	$('.datepicker').datepicker();
</script>

<script>//stuff
$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
         i++;
         $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="item_name[]" placeholder="Enter Equipment Name" class="form-control"/></td><td><input type="number" name="qtyBorrowed[]" class="form-control" placeholder="Quantiy to Borrow" ></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
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


</body>
</html>
