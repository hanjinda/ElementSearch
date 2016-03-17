<html>
<?php
include('conn.php');
?>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"> <!-- display Chinese -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script id="angularScript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.min.js"></script>

<style type="text/css">
	img.resize{
	   max-width:200px;
	   max-height:100%;
	}
	canvas.resize{
	   max-width:200px;
	   max-height:100%;
	}	
	.highlight
	{
		background-color:yellow;
	}
	img{
		border: 1px solid black;
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
	p.inblock{
		padding-left: 20px;
		padding-right: 20px;
	}
	a{
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

	.container{
		width: 968px;
	}
	.container3{
		width: 968px;
		margin: auto;
	}
	.container4{
		width: 90%;
		margin: auto;
		text-align:center;
	}
	.elementBlock{
		width:240px;
		float: left;
		text-align:left;
		word-break:break-all;
	}
	.searchbar{
		width: 968px;
		margin: auto;
		text-align:center;
	}
	.footers{
		width: 100%;
		margin: auto;
		float: center;
		text-align:center;
	}
	.tftextinput{
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
	}
	.tftextselect{
		margin: 0;
		height:27px;
		padding: 5px 5px;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
		border:1px solid #0076a3; 
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
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
</style>
<?php
$input_query = "";
$search_option = "";

if (isset($_GET['q']) && $_GET['q'] != "")
	$input_query = $_GET['q'];

if (isset($_GET['searchOption']) && $_GET['searchOption'] != ""  && $_GET['q'] != ""){
	$search_option = $_GET['searchOption'];
}
?>
</head>
<body>
	<div class="container1">
		<a href="elementSearch.php"><h1>Element Search</h1></a>
	</div>
<div class="searchbar">
<form id="tfnewsearch" method="get" action="elementSearch.php">
	<select type="text" class="tftextselect" name="searchOption" size="1"> 
		<option value="keywordsSearchBox" <?php if($search_option != "keywordsSearch"  && $search_option != "iconSearch") echo 'selected';?>>keywordsBox
		<option value="keywordsSearch" <?php if($search_option == "keywordsSearch") echo 'selected';?>>Keywords
		<option value="iconSearch" <?php if($search_option == "iconSearch") echo 'selected';?>>Icon
	</select>
    <input type="text" class="tftextinput" name="q" size="80" maxlength="100" value="<?php echo $input_query; ?>" placeholder="Search a icon, e.g.: search, home, share, setting, profile, check, back, pdf, add, location, menu, refresh..."><input type="submit" value="Search Mobile Element" class="tfbutton">
</form>
</div>

<?php

if (isset($_GET['q']) && $_GET['q'] != ""){

	$input_query = $_GET['q'];


	if($search_option == "iconSearch"){
		echo '<div class="container3">';
		echo '<p>The element you want to find is: <font color="blue"><strong>'.$input_query.'</strong></font>';

		//element icon
		if ($input_query == "search icon" || $input_query == "search"){
			//display all the images under the folder
			$dir = "pic/searchIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/searchIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "profile icon" || $input_query == "profile" ){
			//display all the images under the folder
			$dir = "pic/profileIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/profileIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "home icon" || $input_query == "home"){
			//display all the images under the folder
			$dir = "pic/homeIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/homeIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "add icon" || $input_query == "add" || $input_query == "plus"|| $input_query == "plus icon"){
			//display all the images under the folder
			$dir = "pic/addIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/addIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "pdf icon" || $input_query == "pdf"){
			//display all the images under the folder
			$dir = "pic/pdfIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/pdfIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "back icon" || $input_query == "goback icon" || $input_query == "go back" || $input_query == "back" ){
			//display all the images under the folder
			$dir = "pic/backIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/backIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "refresh icon" || $input_query == "refresh" ){
			//display all the images under the folder
			$dir = "pic/refreshIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/refreshIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}
		else if ($input_query == "check icon" || $input_query == "check" ){
			//display all the images under the folder
			$dir = "pic/checkIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/checkIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}
		else if ($input_query == "location icon" || $input_query == "location" ){
			//display all the images under the folder
			$dir = "pic/locationIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/locationIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}
		else if ($input_query == "menu icon" || $input_query == "menu" ){
			//display all the images under the folder
			$dir = "pic/menuIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/menuIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}

		else if ($input_query == "setting icon" || $input_query == "setting" ){
			//display all the images under the folder
			$dir = "pic/settingIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/settingIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}
		else if ($input_query == "share icon" || $input_query == "share" ){
			//display all the images under the folder
			$dir = "pic/shareIcon/";
			if($opendir = opendir($dir)){	//open dir
				echo "</p>";
				while (($file = readdir($opendir)) !== FALSE){ 	//read dir
					//echo $file."<br>";
					if($file != "." && $file != ".." && $file != ".DS_Store")
						echo '<img src="pic/shareIcon/'.$file.'" style="width:150px;"> ';
					}
				}
		}
		else {
			echo ', but it is not exist! You can try to search a icon, e.g.: search, home, share, setting, profile, check, back, pdf, add, location, menu, refresh...';//<font color="green">'.$search_option.'</font>';
		}
		echo '</div>';

	}

	else if($search_option == "keywordsSearch"){

		//other elements
		echo '<div  id="inputText" class="container4">';
		echo '<p>The element you want to find is: <font color="blue"><strong>'.$input_query.'</strong></font>';
		/*
		if ($input_query == "imagebutton" || $input_query == "image button"|| $input_query == "ImageButton"  ){
			echo "</p>";
			echo '"text": "",   <br>';
	        echo '"resource-id": "com.sirma.mobile.bible.android:id/home_btn", <br>';
	        echo '"class": "android.widget.ImageButton"';
		}
		*/

		$words = mysql_real_escape_string($input_query);
		$arraySearch = explode(" ", trim($words));
		$countSearch = count($arraySearch);
		$a = 0;
		$query = "SELECT  appname, filename, image_width, image_height, icontext, resourceId, class FROM json_db WHERE ";
		$quote = "'";
		while ($a < $countSearch){
			$query = $query."(icontext LIKE $quote%$arraySearch[$a]%$quote OR resourceId LIKE $quote%$arraySearch[$a]%$quote OR class LIKE $quote%$arraySearch[$a]%$quote)";
			$a++;
			if ($a < $countSearch)
			{
				$query = $query." AND ";
			}
		}
	
		$result = mysql_query($query); 

		$rows = mysql_num_rows($result);
		if ($rows >= 200)
			echo ". Shows from 0 to 200.";
		$result = mysql_query($query."LIMIT 0,200"); 		
		echo ', and the total elements we found <font color="red">'.$rows.'</font> results. ';
?>
	<select type="text" class="tftextselect" name="textSearchOption" size="1"> 
		<option value="defaultSearch" <?php if($search_option != "defaultSearch") echo 'selected';?>>All
		<option value="textSearch" <?php if($search_option == "textSearch") echo 'selected';?>>Text
		<option value="idSearch" <?php if($search_option == "idSearch") echo 'selected';?>>ID
		<option value="classSearch" <?php if($search_option == "classSearch") echo 'selected';?>>Class
	</select>
	<br>
<?php
		$num = 1; //number of drawing
		if($rows != 0){
			while($row = mysql_fetch_array($result)){ 
				$appname = $row['appname'];
				$filename = $row['filename'];
				$icontext = $row['icontext'];
				$resourceId = $row['resourceId'];
				$class = $row['class'];
				echo '<div class="elementBlock">';
				echo '<center><img id="scream'.$num.'" onload="drawblock'.$num.'()" class="resize" src="'.$appname.'/images/'.$filename.'.png"></center>';
				echo '<p class="inblock"><font size="1"><font color="red">Text</font>: '.$icontext.'<br><font color="red">ID</font>: '.$resourceId.'<br><font color="red">Class</font>: '.$class.'<br></font></p>';
				echo '</div>';
				$num = $num + 1;//increasement

			}
		}
		else {
			
			//echo ', but it is not exist!';// <font color="green">'.$search_option.'</font>';
		}

		echo '</div>';
	}		


	else if($search_option == "keywordsSearchBox"){

		//other elements
		echo '<div  id="inputText" class="container4">';
		echo '<p>The element you want to find is: <font color="blue"><strong>'.$input_query.'</strong></font>';
		/*
		if ($input_query == "imagebutton" || $input_query == "image button"|| $input_query == "ImageButton"  ){
			echo "</p>";
			echo '"text": "",   <br>';
	        echo '"resource-id": "com.sirma.mobile.bible.android:id/home_btn", <br>';
	        echo '"class": "android.widget.ImageButton"';
		}
		*/

		$words = mysql_real_escape_string($input_query);
		$arraySearch = explode(" ", trim($words));
		$countSearch = count($arraySearch);
		$a = 0;
		$query = "SELECT  appname, filename, x, y, width, height, image_width, image_height, icontext, resourceId, class FROM json_db WHERE ";
		$quote = "'";
		while ($a < $countSearch){
			$query = $query."(icontext LIKE $quote%$arraySearch[$a]%$quote OR resourceId LIKE $quote%$arraySearch[$a]%$quote OR class LIKE $quote%$arraySearch[$a]%$quote)";
			$a++;
			if ($a < $countSearch)
			{
				$query = $query." AND ";
			}
		}
	
		$result = mysql_query($query); 

		$rows = mysql_num_rows($result);

		//new
		echo ', and the total elements we found <font color="red">'.$rows.'</font> results. ';

		$pages = ceil($rows/50); //page numbers, increasement 1 while not 1
		//echo "Total pages: ".$pages.". ";

		$currentPage = 1;

		if (isset($_GET['page']) && $_GET['page'] != "")
			$currentPage = $_GET['page'];
		
		$startResult = 0 + ($currentPage -1)*50;

		$elementsin1Page = 50;

		$curLinkWhole = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		//echo $_SERVER['REQUEST_URI'];
		$curLink = "elementSearch.php?searchOption=".$_GET['searchOption']."&q=".$_GET['q'];
		//echo '<a href="'.$curLink.'&page=2">干我</a> ';

		echo 'Go to page <select type="text" class="tftextselect" name="textSearchOption" size="1" onchange="location = this.options[this.selectedIndex].value;">'.$currentPage;
		
		for($pagenum=1; $pagenum<=$pages; $pagenum++){
			if($pagenum == $currentPage)
				echo '<option value="1" selected>'.$pagenum;
			else
				echo '<option value="'.$curLink.'&page='.$pagenum.'">'.$pagenum;
		}
		
		echo '</select>';

		//separate pages
		//if($rows >= 50)
		//	echo ". Shows from 0 to 50.";
		$result = mysql_query($query."LIMIT ".$startResult.",".$elementsin1Page.""); 

?>
	<select type="text" class="tftextselect" name="textSearchOption" size="1" onchange="location = this.options[this.selectedIndex].value;"> 
		<option value="#" <?php if($search_option != "defaultSearch") echo 'selected';?>>All
		<option value="?table=text" <?php if($search_option == "textSearch") echo 'selected';?>>Text
		<option value="#" <?php if($search_option == "idSearch") echo 'selected';?>>ID
		<option value="#" <?php if($search_option == "classSearch") echo 'selected';?>>Class
	</select>
	<br>
<?php
		$num = 1; //number of drawing

		if($rows != 0){
			while($row = mysql_fetch_array($result)){ 
				$filename = $row['filename'];
				$x = $row['x']+10;
				$y = $row['y']+10;
				$width = $row['width'];
				$height =$row['height'];
				$appname = $row['appname'];
				$filename = $row['filename'];
				$icontext = $row['icontext'];
				$resourceId = $row['resourceId'];
				$class = $row['class'];
				echo '<div class="elementBlock">';
				echo '<script>function drawblock'.$num.'(){var c1 = document.getElementById("myCanvas'.$num.'"); var ctx1 = c1.getContext("2d");	
					  var img1 = document.getElementById("scream'.$num.'");  	  ctx1.drawImage(img1,10,10);  	  
					  var canvas1 = document.getElementById(\'myCanvas'.$num.'\'); var context1 = canvas1.getContext(\'2d\'); ctx1.beginPath();	  
					  ctx1.lineWidth="10";	  ctx1.strokeStyle="lightgreen";ctx1.rect('.$x.','.$y.','.$width.','.$height.');  ctx1.stroke();	}</script>';

/*	<img class="resize" onload="drawblock<?php echo $num;?>()" id="scream<?php echo $num;?>" src="my<?php echo $num;?>.png" width="0" height="0">

	<canvas  class="resize" id="myCanvas<?php echo $num;?>" width="1440" height="2560"></canvas>	*/		

				echo '<center><img id="scream'.$num.'" onload="drawblock'.$num.'()" class="resize" src="'.$appname.'/images/'.$filename.'.png" width="0"></center>';
				
				echo '<center><canvas class="resize" id="myCanvas'.$num.'" width="1440" height="2560"></canvas></center>';
				
				echo '<p class="inblock"><font size="1"><font color="red">Text</font>: '.$icontext.'<br><font color="red">ID</font>: '.$resourceId.'<br><font color="red">Class</font>: '.$class.'<br></font>';
				echo '<font size="1">'.$num.'. filename: '.$appname.'/'.$filename.', x = '.$x.', y= '.$y.', width = '.$width.', height = '.$height.'.</font></p>';
				echo '</div>';

				$num = $num + 1;//increasement

			}
		}
		else {
			
			//echo ', but it is not exist!';// <font color="green">'.$search_option.'</font>';
		}

		echo '</div>';
	}		









	else {
		echo '<div class="container3"><p>The element you want to find is: <font color="blue"><strong>'.$input_query.'</strong></font>';
		echo ', but it is not exist!</div>';// <font color="green">'.$search_option.'</font>';

		echo '<center><br><br><p><font size="1">By Jinda, icon: Kedan | <a href="index.php">Home</a></font></p></center>';

	}
	//echo "</p>";
}
else
	echo '<center><br><br><p><font size="1">By Jinda, icon: Kedan | <a href="index.php">Home</a></font></p></center>';

?>


</body>

<script>

window.onload = function() {
	//document.write("hello");
	//highlight('search');
	//alert1();
}

function alert1(){
	alert("<?php echo 'hahha';?>");

}

function highlight(text)
{
    inputText = document.getElementById("inputText")
    var innerHTML = inputText.innerHTML
    var index = innerHTML.indexOf(text);
    if ( index >= 0 )
    { 
        innerHTML = innerHTML.substring(0,index) + "<span class='highlight'>" + innerHTML.substring(index,index+text.length) + "</span>" + innerHTML.substring(index + text.length);
        inputText.innerHTML = innerHTML 
    }

}

function drawblock(){
	  var c1 = document.getElementById("myCanvas1");
	  var ctx1 = c1.getContext("2d");
	  var img1 = document.getElementById("scream1");  
	  ctx1.drawImage(img1,10,10);  
	  var canvas1 = document.getElementById('myCanvas1');
	  var context1 = canvas1.getContext('2d');

	  // Blue rectangle
	  ctx1.beginPath();
	  ctx1.lineWidth="10";
	  ctx1.strokeStyle="red";
	  ctx1.rect(20,100,180,180);
	  ctx1.stroke();
}
</script>
<!--
<div class="footers">
<center><br><br><p><font size="1">By Jinda, icon: Kedan | <a href="index.php">Home</a></font></p></center>
</div>
-->
</html>