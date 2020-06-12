<!DOCTYPE html>
<html>
<head>
	<title>File Handling in PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
      <ul>
         <li><a href="files2.php">Insert</a></li>
         <li><a href="view.php">View</a></li>
         <li><a href="search.php">Search</a></li>
      </ul>
   </nav>
	<br>
	<?php
		if(file_exists("students.txt")==0){
			echo 'No records found';
		}
		else{
			$myfile = fopen("students.txt", "r") or die('<span style="color: red;">Could not open file</span>');
			echo "<table><tr><th>Registration number</th><th>Name</th></tr>";
			while(!feof($myfile)) {
			  	$s = fgets($myfile);
			  	$s = explode(",",$s);
			  	if($s[0]!='' && $s[1]!=''){ 
			  		$s[1] = substr($s[1], 1, strlen($s[1])-3);
			  		echo "<tr><td>$s[0]</td><td>$s[1]</td></tr>";
			  	}
			}
			echo "</table>";
			fclose($myfile);
		}
	?>
</body>
</html>