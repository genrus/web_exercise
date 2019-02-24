<?php
	include 'db_con.php';
	
	/*
	Various checking queries that are needed (the email is already used, the username is already used)
	+ Password checks (if the password is less than 8 chars or something, result of the registration must be negative)  
	*/

	$username_reg = $_POST['username_reg'];
	$email_reg = $_POST['email_reg'];
	$password_reg = $_POST['password_reg'];

	$sql_username = "SELECT * FROM cred_utenti WHERE username = '".$username_reg."';";
	$sql_email = "SELECT * FROM cred_utenti WHERE email = '".$email_reg."';";

	$query_username = mysqli_query($connessione_al_server, $sql_username);
	$query_email = mysqli_query($connessione_al_server, $sql_email);

	if((!$query_email)||(!$query_username))
	{
		exit("Query failed, error n".mysqli_errno($connessione_al_server)."<br/>");
	}
	else
	{

		$rows_username = mysqli_num_rows($query_username);
		$rows_email = mysqli_num_rows($query_email);

		if( ($rows_email == 0) && ($rows_username == 0) )
		{
			$sql_insert_user = "INSERT INTO cred_utenti (username, email, password) values ('".$username_reg."', '".$email_reg."', '".$password_reg."');";
			$query_ins_user = mysqli_query($connessione_al_server, $sql_insert_user);
			if(!$query_ins_user)
			{
				exit("Insert into database failed, error n".mysqli_errno($connessione_al_server)."<br/>");
			}
			else
			{
				$_SESSION['username'] = $username_reg;
				$_SESSION['password'] = $password_reg;
				$_SESSION['logged'] = true;

				header("Location: prova.php");
			}
		}
		else
		{
			if($rows_email > 0)
				exit("An account with that email is already registered.<br/>");
			else
				exit("An account with that username is already registered.<br/>");
		}
	}
	
?>