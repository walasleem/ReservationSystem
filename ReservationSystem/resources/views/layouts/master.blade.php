<!DOCTYPE html>
<html>
	<head>
		<title>My Try</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style type="text/css">

          table form {margin-bottom: 0;}
          form ul {margin-left: 0; list-style: none;}
          .error{color: red; font-style: italic;}
          body{padding-top: 20px; margin-left: 25%;}
		</style>
	</head>
	<body>
		<div class="container">
		@include('layouts.flashMessage')

		@yield('content')
	</div>
	</body>
</html>