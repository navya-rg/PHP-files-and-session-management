<!DOCTYPE html>
<html>
<head>
	<title>Cookies and Session</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
	session_start();
	setcookie("username", "navya", time()+60*60*24*10);
	setcookie("password", "12345", time()+60*60*24*10);
	echo '<span class="red">$_COOKIE: </span>'; print_r($_COOKIE); echo '<br>';
?>
<body>
	<?php
		if (isset($_GET['logout'])) {
    		unset($_SESSION['user']);
    		header("Location: http://localhost/17BCE2416_DA4/cookies&session.php");
  		}
		if(isset($_POST['login'])) {
	        $username = $_POST['username'];
	        $password = $_POST['password'];
	        if($username==$_COOKIE["username"] && $password==$_COOKIE["password"]){
	        	echo '<span class="red">$_SESSION before login: </span>'; print_r($_SESSION); echo '<br>';
	        	echo "<br>Successfully logged in<br>";
	        	$_SESSION['user'] = $username;
	        	echo '<span class="red">$_SESSION after login: </span>'; print_r($_SESSION); echo '<br>';
	        	echo "<br>Hello ".$_SESSION['user']."!!<br>";
	        	echo "<a href='cookies&session.php?logout=true'><button>Logout</button></a>";
	        }
	        else
	        	echo "<br>Invalid username or password";
	    }
	    else{
	    	echo '<span class="red">$_SESSION: </span>'; print_r($_SESSION); echo '<br>';
	?>

	<h1>Login:</h1>
	<form method="POST" action="<?php $_PHP_SELF ?>" id="loginForm">
		<label for="username">Username:</label>
		<input type="text" name="username">
		<label for="password">Password</label>
		<input type="password" name="password"><br><br>
		<div class="center"><button type="submit" form="loginForm" value="Submit" name="login">Login</button></div>
	</form>

<?php } ?>
	<span id="status"></span>
	<!-- <script type="text/javascript">
		while(true){ 
			var status = "<?php //echo $status ?>";
			document.getElementById("status").innerHTML = status;
		}
	</script> -->
</body>
</html>