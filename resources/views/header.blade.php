<!DOCTYPE html>
<html>
<head>
    <title>Bk App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <style>
        .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}
</style>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>
<body>
</body>
<div class="container">

    <nav class="navbar navbar-inverse">
      
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/') }}"><i class="fa fa-house"></i> Home </a></li>

            <li><a href="{{ URL::to('School') }}"><i class="fa fa-school"></i> School </a></li>
            <li><a href="{{ URL::to('Student') }}"><i class="fa fa-people-roof"></i> Student</a>
        </ul>
    </nav>
    
 
    
   