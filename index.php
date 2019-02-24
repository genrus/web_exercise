<?php
	session_start();
	include("db_con.php");
?>

<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div id="left_div" style="float:left;">	
			<h2>Registrazione</h2><br/>
			<form name="form_registration" method="post" action="registration.php">
				<p>Username: <input type="text" name="username_reg"></p>
				<br/>
				<p>Password: <input type="password" name="password_reg"></p>
				<br/>
				<p>Email: <input type="text" name="email_reg" ></p>
				<br/>
				<button>Registrati</button>
			</form>
		</div>
		<div id="right_div" style="float:left;">
			<h2>Log in</h2><br/>
			<form name="form_login" method="post" action="login.php">
				<p>Username:</p><input type="text" name="username" ></p>
				<br/>
				<p>Password:<input name="password"></p>
				<br/>
				<button>Accedi</button>
			</form>
		</div>
	</body>

</html>