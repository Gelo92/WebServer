<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Ludiflex | Login</title>
	
</head>

<style>



</style>
<body>
	<div class="box">
		<div class="container">
			<div class="top-header">

		
</body>
<header>
	<div id="wrap">
		 <div class="center"> 
      <ul class="navbar">
		</ul>
		<div class="header-logo">
			<?php
			if (isset($_SESSION['userId'])) {
					echo '<form action="includes/logout.inc.php" method="post">
			<button type="submit" name="logout-submit">Logout</button>
			</form>	';
				}
				else{
					echo '<form action="includes/login.inc.php" method="post">
				<h1>Sign-in</h1>
				<input type="text" name="mailuid" placeholder="Username/E-mail...">
				<input type="password" name="pwd" placeholder="Password...">
				<button type="submit" name="login-submit">Login</button>
			</form> 
			<a href="reset-password.php">Forgot your password?</a>
			<br>
			<a href="signup.php">Signup</a>';
				}

			?>
				</div>
			
		</div>
		
	</div>

		</div>
		</div>
	</nav>
</header>




