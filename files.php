<!DOCTYPE html>
<html>
<head>
	<title>File Handling in PHP</title>
</head>
<body>
<?php
	$myfile = fopen("file1.txt", "w") or die("Unable to create file!");
	fwrite($myfile, "This is some sample text\n");
	fwrite($myfile, "This is some other sample text\n");
	fputcsv($myfile, array("Apple", "Banana" ,"Mango", "Grapes"));
	echo "Sucessfully written<br>";
	fclose($myfile);

	echo "<br>Contents of file1.txt read using readfile():<br>";
	echo readfile("file1.txt");

	$myfile = fopen("file1.txt", "r") or die("Unable to open file!");
	echo "<br><br>Contents of file1.txt read using fread():<br>";
	echo fread($myfile,filesize("file1.txt"));
	fclose($myfile);

	$myfile = fopen("file1.txt", "r") or die("Unable to open file!");
	echo "<br><br>Contents of file1.txt read using fgets():<br>";
	while(!feof($myfile)) {
	  	echo fgets($myfile) . "<br>";
	}
	fseek($myfile,6);
	echo fgets($myfile);
	echo "<br>Current location: ".ftell($myfile);
	fclose($myfile);

	$myfile = fopen("file1.txt", "r") or die("Unable to open file!");
	echo "<br><br>Contents of file1.txt read using fgetc():<br>";
	while(!feof($myfile)) {
	  echo fgetc($myfile);
	}
	fclose($myfile);

	echo copy("file1.txt","file2.txt");
	$myfile = fopen("file2.txt", "r") or die("Unable to open file!");
	echo "<br><br>Contents of file2.txt read using fread():<br>";
	echo fread($myfile,filesize("file2.txt"));
	fclose($myfile);

	if(file_exists("file1.txt")==1)
		echo '<br><br>file1.txt exists<br>';
	else
		echo '<br><br>file1.txt does not exist<br>';
	if(file_exists("file2.txt")==1)
		echo 'file2.txt exists<br>';
	else
		echo 'file2.txt does not exist<br>';

	$file = "file2.txt";
	if (!unlink($file))
	  echo ("Error deleting file2.txt<br>");
	else
	  echo ("Deleted file2.txt<br>");

	if(file_exists("file2.txt")==1)
		echo 'file2.txt exists<br>';
	else
		echo 'file2.txt does not exist<br><br>';

	print_r(file("file1.txt"));

	echo "<br><br>Type of file1.txt: ".filetype("file1.txt");

	$file = "New Directory";
	mkdir("New Directory");
	if(is_dir($file))
	  echo ("<br><br>$file is a directory");
	else
	  echo ("<br><br>$file is not a directory");
	if(is_file($file))
	  echo ("<br>$file is a file");
	else
	  echo ("<br>$file is not a file");
	$file = "file1.txt";
	if(is_dir($file))
	  echo ("<br>$file is a directory");
	else
	  echo ("<br>$file is not a directory");
	if(is_file($file))
	  echo ("<br>$file is a file<br><br>");
	else
	  echo ("<br>$file is not a file<br><br>");
	
	$path = "New Directory";
	if(!rmdir($path))
	  echo ("Could not remove $path<br><br>");
	else
		echo ("Successfully removed $path<br><br>");

	print_r(pathinfo("file1.txt"));
?>
</body>
</html>