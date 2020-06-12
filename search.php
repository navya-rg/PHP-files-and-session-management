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
	<form method="POST" action="<?php $_PHP_SELF ?>" id="myForm">
		<h2><b>Search student:</b></h2>
		<label for="query">Rgistration number/ Name:</label>
		<input type="text" name="query" style="width:55%;" required><br><br>
		<div class="center"><button type="submit" form="myForm" value="Submit" name="search">Search</button></div>
	</form><br><br>

	<?php
		if(isset($_POST['search'])) {
        	$query = trim($_POST['query']);
			if(file_exists("students.txt")==0){
				echo 'No records found';
			}
			else{
				$myfile = fopen("students.txt", "r") or die('<span style="color: red;">Could not open file</span>');
				$regno = "";
				$name = "";
				while(!feof($myfile)){
				  	$s = fgets($myfile);
				  	$s = explode(",",$s);
				  	if($s[0]!='' && $s[1]!=''){
				  		$s[1] = substr($s[1], 1, strlen($s[1])-3);
				  	}	
				  	if($s[0]!='' && $s[1]!='' && (strtolower($s[0])==strtolower($query) || strtolower($s[1])==strtolower($query))){ 
				  		$regno = $s[0];
				  		$name = $s[1];
				  	}
				}
				if($regno!='' && $name!=''){
					echo "<table><tr><th>Registration number</th><th>Name</th></tr><tr><td>$regno</td><td>$name</td></tr></table>";
				}
				else{
					echo '<span style="color: red;">No records found</span>';
				}
				fclose($myfile);
			}
      	}
	?>
</body>
</html>