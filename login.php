<?php  
require_once("conn.php");
$error = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$query = "SELECT * FROM users";
	$a = $conn->query($query);
	$login = false;
	while($data = $a->fetch_assoc()){
		$login = $_POST["username"] == $data["username"] && $_POST["password"] == $data["password"];
	}
	if(!$login){
		$error = "Username or Password wrong";
	}else{
		session_start();
		$_SESSION["username"] = $_POST["username"];
		header("Location: index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title>Login</title>
</head>
<body>
	<form style="width: 30vw;border: solid 1px black; border-radius: 3px; margin-top: 10vw; margin-left: 5vw; padding: 1vw;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method ="POST">
		<span style="font-size: 2vw; margin-left: -0.2vw; ">Login</span>
		<div class="form-group" style="margin-top: 2vw;">
			<label for="username" style="margin-left: -0.2vw;">Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username"></input>
		</div>
		<div class="form-group">
			<label for="password" style="margin-left: -0.2vw;">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password"></input>
		</div>
		<span><?php echo $error;?></span>
		<input type="submit" value="Login" class="btn btn-primary" style="margin-bottom: 2vw;">
		<a class="btn btn-danger" style="color: white; margin-top: -1.9vw;" href="register.php">Register</a>
	</form>
</body>
</html>