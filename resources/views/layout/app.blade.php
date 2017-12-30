<html>
	<head>
		<title>{{$title}}</title>
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

	<body class="grey"style="padding-left:200px">
		<div class="container">
			@include('inc/messages')
		</div>
			@include('inc/navbar')
    	@yield('content')

	</body>
	<!-- Compiled and minified JavaScript -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script>
	$(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
<script>
	$(document).ready(function() {
	$('select').material_select();
});</script>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<script>
$('input.autocomplete').autocomplete({
    data: {
      "Apple": null,
      "Microsoft": null,
      "Google": null,
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
</script>
</body>
</html>
