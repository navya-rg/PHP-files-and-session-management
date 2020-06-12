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
		<h2><b>Insert student:</b></h2>
		<label for="regno">Rgistration number:</label>
		<input type="text" name="regno" pattern="[0-9]{2}[A-Za-z]{3}[0-9]{4}" required><br>
		<label for="name">Student name:</label>
		<input type="text" name="sname" required><br>
		<div class="center"><button type="submit" form="myForm" value="Submit" name="insert">Insert</button></div>
	</form>

	<?php
      if(isset($_POST['insert'])) {
         $regno = trim($_POST['regno']);
         $sname = trim($_POST['sname']);

         function write($regno, $sname){
            $myfile = fopen("students.txt", "a") or die('<span style="color: red;">Error</span>');
            fputcsv($myfile, array($regno, $sname));
            echo 'Student successfully added';
         }

         if(file_exists("students.txt")==1){
            $myfile = fopen("students.txt", "r") or die('<span style="color: red;">Could not open file</span>');
            $str = fread($myfile,filesize("file1.txt"));
            if(stristr($str,$regno)!=''){
               echo '<span style="color: red;">Student already exists</span>';
            }
            else write($regno, $sname);
            fclose($myfile);
         }
         else write($regno, $sname);
      }
   ?>
</body>
</html>