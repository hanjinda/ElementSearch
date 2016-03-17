 <?php
//jsontomysql
if(include('conn.php')){

	include('conn.php');
/*
	$sql_test = 'INSERT INTO `json_db`(`appname`) VALUES ("112")';
	$import = mysql_query($sql_test);
	if($import) echo "very good, import!<br>"; else echo "import failed :-(<br>";
*/
	$appname = "sticky";
	$max_file_number = 254;
	$filenum = 0;

	//mysql_query("DELETE FROM `json_db`");//empty the db

	for ($filenum = 0; $filenum <= $max_file_number; $filenum++){

		$filename = "view_".$filenum."";
		//echo $filename;

		$jsondata = file_get_contents(''.$appname.'/json/view_'.$filenum.'.json');
		$data = json_decode($jsondata, true);

		$image_width = $data['view_width'];
		$image_height = $data['view_height'];
		$all_nodes = $data['all_nodes'];

		foreach($all_nodes as $row){
			$x = $row['x'];
			$y = $row['y'];
			$width = $row['node_width'];
			$height = $row['node_height'];
			$icontext = $row['text'];
			$resourceId = $row['resource-id'];
			$class = $row['class'];

			$sql1 = 'INSERT INTO `json_db`(`appname`, `filename`, `image_width`, `image_height`, `x`, `y`, `width`, `height`, `icontext`, `resourceId`, `class`) ';
			$sql2 = 'VALUES ("'.$appname.'", "'.$filename.'", "'.$image_width.'", "'.$image_height.'", "'.$x.'", "'.$y.'", "'.$width.'", "'.$height.'", "'.$icontext.'", "'.$resourceId.'", "'.$class.'")';
			$sql = $sql1.$sql2;
			echo $sql."<br>";
			$import = mysql_query($sql);
			if($import) echo "very good, import!<br>"; else echo "import failed :-(<br>";

			echo $filename.", ".$image_width.", ".$image_height.", ";
			echo $x.", ".$y.", ".$width.", ".$height.", ".$icontext.", ".$resourceId.", ".$class."<br>";

		}


	}
}
else
	echo "not connected!<br>";
?>