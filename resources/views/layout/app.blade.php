<html>
	<head>
		<title>{{$title}}</title>
		<!-- Compiled and minified CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <style>
        /*.btn-small used for most submit buttons
          change color button in inline style
          change text color in buttons here
        */
        .btn-small {
           height: 24px;
           line-height: 24px;
           padding: 0 0.5rem;
           color: #ffffff; 
          }
          /*
            General body settings
            Change here if needed
            Change via inline if needed only
          */
          body{
            padding-left:200px;
            background-color: #ffffff;
          }
          /*
            Footer color must be darker than from body bgcolor
          */
          footer{
            background-color: black;
          }
          /*
            Settings must be the same as footer
          */
          #footer-copyright{
            background-color: #2e2e2e;
          }
          /*
            Change via inline
          */
          .form{
             background-color: #e8e8e8;
             color: #000000;
             padding: 30px;
             border-radius: 20px;
          }
          /*
            Change via inline
          */
          h1, h2, h3, h4, h5{
            color: #000000;
          }
          p{
            color: #000000;
          }
          #card-panel{
            color: white;
            height: auto;
            margin: 2px;
            border-radius: 10px;
            font-color: ;
          }
          .flow-text{
            color: black;
          }
          table{
            color: #a3a3a3;
            text-color: 
          }
          table td{
            color: #000000;
          }
          table th{
            color: #000000;
          }
      </style>

  </head>

	<body>
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
