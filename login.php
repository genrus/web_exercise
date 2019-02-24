<?php

	include 'db_con.php';
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=$_POST['password'];

	$sql = "SELECT * FROM cred_utenti WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."';";
	$query = mysqli_query($connessione_al_server, $sql);

	if(!$query)
	{
		exit("Query fallita<br/>");
	}
	else
	{
		$rows_query = mysqli_num_rows($query);
		if($rows_query == 1) // If the number of rows of the resulting table is 1 (if the user is registered onto the db) todo: can a user register multiple times and can this query result in a table that has more than 1 row?
		{
			$row = mysqli_fetch_array($query);
			header("Location:prova.php");
			$_SESSION['logged'] = true;
		}
		else
		{
			exit("you're not logged in ".$rows_query."<br/>");
		}

	}

?>