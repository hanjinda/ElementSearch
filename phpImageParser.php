<html> 
<?php
if (isset($_GET["x"])){
	$imageName = $_GET["image_name"];
	$imageType = $_GET["image_type"];

	$width = $_GET["width"];
	$height = $_GET["height"];
	$y = $_GET["y"];
	$x = $_GET["x"];
}
else  {
	$imageName = "./etsy/images/view_579";
	$imageType = "png";

	$width = 196;
	$height = 196;
	$y = 88;
	$x = 0;
}
/*  <?php echo $width;?>   */
/*  <?php echo $height;?>   */
/*  <?php echo $top;?>   */
/*  <?php echo $left;?>   */
// 
$num = 1;
?>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script id="angularScript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.min.js"></script>

	<style type="text/css">
		canvas.resize{
		   max-width:20%;
		   max-height:20%;
		}
		.highlight
		{
			background-color:yellow;
		}
		#part_img{
			width: <?php echo $width;?>px;
			height: <?php echo $height;?>px;
			overflow: hidden;
			position: relative;
			border: 1px solid black;
		}
		#part_img img{
			position: absolute;
			top: <?php echo "-".$y;?>px;
			left: <?php echo "-".$x;?>px;
		}
		#block_img {
	 		float: left;
		}
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
		.container-ImageParser{
			width: 400px;
			margin: auto;
		}
		hr{
			size:30;
		}
		.tfbutton-whole {
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
			border-top-left-radius: 5px 5px;
			border-bottom-left-radius: 5px 5px;
		}
		.tfbutton-whole:hover {
			text-decoration: none;
			background: #007ead;
			background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
			background: -moz-linear-gradient(top,  #0095cc,  #00678e);
		}
		/* Fixes submit button height problem in Firefox */
		.tfbutton-whole::-moz-focus-inner {
		  border: 0;
		}
		.tfclear{
			clear:both;
		}
	</style>
</head>
<body>

<!--// display -->
<a href="phpImageParser.php"><h1>PHP Image Parser</h1></a>
<div class="container-ImageParser">
	<form action="phpImageParser.php?">
		X = <input name="x" value="<?php echo $x;?>" size="8"></input> <br>
		Y = <input name="y" value="<?php echo $y;?>" size="8"></input> <br>
		width = <input name="width" value="<?php echo $width;?>" size="8"></input> <br>
		heigth = <input name="height" value="<?php echo $height;?>" size="8"></input> <br>
		image name <input name="image_name" value="<?php echo $imageName;?>" size="30"></input>.<input name="image_type" value="<?php echo $imageType;?>" size="8"></input><br>
		or <br>
		Copy the json text<br><textarea width="300px" rows="6" cols="60" ></textarea> <br>

		<input class="tfbutton-whole" type="submit" value="Cut it!"><br><br>
	</form>
	<!--//python json formatter-->

</div>
<center>
<div id="part_img">
	<img  src="<?php echo $imageName;?>.<?php echo $imageType;?>">
</div>

<?php
echo '<script>function drawblock'.$num.'(){var c1 = document.getElementById("myCanvas'.$num.'"); var ctx1 = c1.getContext("2d");	
  var img1 = document.getElementById("scream'.$num.'");  	  ctx1.drawImage(img1,10,10);  	  
  var canvas1 = document.getElementById(\'myCanvas'.$num.'\'); var context1 = canvas1.getContext(\'2d\'); ctx1.beginPath();	  
  ctx1.lineWidth="10";	  ctx1.strokeStyle="red";ctx1.rect(10,98,196,196);  ctx1.stroke();	}</script>';

?>
	<img class="resize" onload="drawblock<?php echo $num;?>()" id="scream<?php echo $num;?>" src="my<?php echo $num;?>.png" width="0" height="0">

	<canvas  class="resize" id="myCanvas<?php echo $num;?>" width="1440" height="2560"></canvas>
	<p>"content-desc":"Navigate up"</p>

<?php 
$num = $num + 1;
echo '<script>function drawblock'.$num.'(){var c1 = document.getElementById("myCanvas'.$num.'"); var ctx1 = c1.getContext("2d");	
  var img1 = document.getElementById("scream'.$num.'");  	  ctx1.drawImage(img1,10,10);  	  
  var canvas1 = document.getElementById(\'myCanvas'.$num.'\'); var context1 = canvas1.getContext(\'2d\'); ctx1.beginPath();	  
  ctx1.lineWidth="10";	  ctx1.strokeStyle="red";ctx1.rect(234,131,840,126);  ctx1.stroke();	}</script>';
?>

	<img class="resize" onload="drawblock<?php echo $num;?>()" id="scream<?php echo $num;?>" src="my<?php echo $num;?>.png" width="0" height="0">

	<canvas  class="resize" id="myCanvas<?php echo $num;?>" width="1440" height="2560"></canvas>
	<p>"text":" Search items, shops or people"</p>
	<p>"resource-id":"com.etsy.android:id/search_src_text"</p>



</center>
</body>
<center><br><br><p><font size="1">By Jinda | <a href="index.php">Home</a></font></p></center>

</html>