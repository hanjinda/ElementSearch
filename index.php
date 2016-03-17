<html>

<head>
	<title>The Mobile Project</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"> <!-- display Chinese -->
	<meta content="width=device-width, initial-scale=1" name="viewport" /> <!-- fit the Cellphone and Pad-->
	<style type="text/css">
	h1{
		font-family: "Verdana";
		font-size:30px;
		text-align:center;
	}
	p{
			font-family: "Verdana";
			font-size:16px;
		}
	a {
			font-family: "Verdana";
			color: black;
			text-decoration:none;
		}
	a:hover{
		color: orange;
	}
	#nav a:hover{
		text-decoration: underline;
	}

	#nav_btn a:hover{
		border:1px solid #ccc;
		padding:5px;
		background: lightgrey;
		text-decoration:none;
		color: orange;
	}
	hr{
		size:30;
	}
	.container-homepage{
		width: 400px;
		margin: auto;
		background:lightgrey;
		text-align:center;
	}
	#cv {
		font-family: 'Dancing Script', cursive;
		font-weight: bold;
	}
	#body_whole{
		width: 968px;
		margin: auto;
	}
	.tfbutton {
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
	}
	.tfbutton:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
	img:hover{
		width: 100%;
	}

</style>

</head>
<body><div class="container-homepage">
<br>
<a href="index.php"><h1>The Mobile Project</h1></a>
<a href="elementSearch.php" >Element Search</a> | 
<a href="phpImageParser.php">Image Parser</a> | 
<a href="index.php?action=about">About</a>
<?php
if (isset($_GET['action']) && $_GET['action'] == "about"){
	echo '<center><br><p><font size="1">By Jinda<br> work with Biplab, Kedan, and Abhishek, Stefanus<br>@ Ranjitha\'s Data-Driven Design Group </font></p></center><br>';
	echo '</div><center><img src="info.jpg" width="400px"></img></center>';
}
else
	echo '<br><br><br>';
?>

</div>
</body>

</html>